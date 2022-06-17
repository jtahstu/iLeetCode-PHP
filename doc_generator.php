<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/17 10:45
 * Desc: 自动生成代码文档
 */

$all_files = [];
$dirs = ['Difficult', 'Medium', 'Normal'];
foreach ($dirs as $dir) {
    $real_dir = __DIR__ . '/' . $dir;
    $files = scandir($real_dir);
    foreach ($files as $k => $file) {
        if (strpos($file, '.php') === false) {
            unset($files[$k]);
            continue;
        }
        $content = file_get_contents($real_dir . '/' . $file);
        $rows = explode("\n", $content);
        $time = $link = '';
        foreach ($rows as $kk => $row) {
            if (strpos($row, 'Time') !== false) {
                $time = trim(str_replace('* Time: ', '', $row));
            }
            if (strpos($row, 'http') !== false && strpos($rows[$kk - 1], 'Des') !== false) {
                $link = trim(str_replace('*', '', $row));
            }
            if ($time && $link)
                break;
        }
        $all_files[] = [
            'Dificulty' => $dir,
            'Dir' => "./{$dir}/{$file}",
            'File' => str_replace('.php', '', $file),
            'Time' => $time ?: '-',
            'Link' => $link ?: '#',
        ];
    }

}

echo "total files " . count($all_files) . PHP_EOL;

$sort_arr = [];
foreach ($all_files as $file) {
    $sort_arr[] = strtotime($file['Time']);
}
array_multisort($sort_arr, SORT_NUMERIC, SORT_DESC, $all_files);

$format = "| [%s](%s) | [PHP](%s) | %s |";
$str = "| 题目 | 题解 | AC日期 |\n|----|:----:|:----:|\n";
foreach ($all_files as $file) {
    $str_a = sprintf($format, $file['File'], $file['Link'], str_replace(' ', '%20', $file['Dir']), $file['Time']);
    $str .= $str_a . PHP_EOL;
}
$readme = "./README.md";
$content = file_get_contents($readme);
$start = strpos($content, '<!--start-->') + 13;
$end = strpos($content, '<!--end-->') - 1;
print_r([$start, $end]);
$content = str_replace(substr($content, $start, $end - $start + 1), $str, $content);;
file_put_contents($readme, $content);
echo "update success\n";

//echo json_encode($all_files, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
