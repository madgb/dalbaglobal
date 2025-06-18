<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/head.php"; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}
$limit = 4;
$offset = $_POST['offset'];
$historyYearData = getHistoryYearData($DB, $limit, $offset);

$html_pc = "";
$html_mo = "";

foreach ($historyYearData as $year) {
    $historyMonthData = getHistoryMonthData($DB, $year);
    $html_pc .= '<div class="item">';
    $html_pc .= "<h3>$year</h3>";
    $html_pc .= '<button type="button" class="one"></button>';
    $html_pc .= '<div class="time_line">';
    foreach ($historyMonthData as $month) {
        $historyData = getHistoryData($DB, $year, $month);
        $html_pc .= '<div class="year">';
        $html_pc .= "<h4>$month</h4>";
        $html_pc .= '<ul>';
        foreach ($historyData as $data) {
            $html_pc .= "<li>".$data['content']."</li>";
        }
        $html_pc .= '</ul>';
        $html_pc .= '</div>';
    }
    $html_pc .= '</div>';
    $html_pc .= '</div>';
}

foreach ($historyYearData as $year) {
    $historyMonthData = getHistoryMonthData($DB, $year);
    $html_mo_years .= "<li><a href='#tab_$year'>$year</a></li>";
    $html_mo .= "<div id='tab_$year' class='year_detail' style='display:none;'>";
    foreach ($historyMonthData as $month) {
        $historyData = getHistoryData($DB, $year, $month);
        $html_mo .= "<div class='item'>";
        $html_mo .= "<h3>$month</h3>";
        $html_mo .= "<ol>";
        foreach ($historyData as $data) {
            $html_mo .= "<li>".$data['content']."</li>";
        }
        $html_mo .= "</ol>";
        $html_mo .= "</div>";
    }
    $html_mo .= "</div>";
}

echo json_encode([
    'html_pc' => $html_pc,
    'html_mo' => $html_mo,
    'html_mo_years' => $html_mo_years,
    'data_count' => count($historyYearData),
]);