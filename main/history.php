<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/header.php"; ?>
<?php

$historyYearData = getHistoryYearData_nolimit($DB);

$lang = $_SESSION['lang'] ? $_SESSION['lang'] : 'KR';



?>
<main class="main">
    <div class="section_2 his_section">
        <!-- pc-history start -->
        <div class="history_inner">
            <h1>History</h1>
            <div class="history_cont history_pc" id="history_pc">
                <?
                $cnt = 0;
                foreach ($historyYearData as $year) {
                    $historyMonthData = $lang == "EN" ? getHistoryMonthData_eng($DB, $year) : getHistoryMonthData($DB, $year);
                    ?>
                    <div class="item">
                        <h3 class=" <?= $cnt == 0 ? "active" : "" ?>"><?= $year ?></h3>
                        <button type="button" class="one <?= $cnt == 0 ? "active" : "" ?>"></button>
                        <div class="time_line">
                            <? foreach ($historyMonthData as $month) {
                                $historyData = $lang == "EN" ? getHistoryData_eng($DB, $year, $month) : getHistoryData($DB, $year, $month);
                                ?>
                                <div class="year">
                                    <h4><?= $month ?></h4>
                                    <ul>
                                        <? foreach ($historyData as $data) { ?>
                                            <li><?= $data['content'] ?></li>
                                        <? } ?>
                                    </ul>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                    <? $cnt++;
                } ?>
            </div>
        </div>
        <!-- pc-history end -->
        <!-- mo-history start -->
        <div class="mo_his_inner ">
            <div class="cont">
                <h1>History</h1>
                <ul class="year_btn" id="history_mo_years">
                    <? foreach ($historyYearData as $year) { ?>
                        <li><a href="#tab_<?= $year ?>"><?= $year ?></a></li>
                    <? } ?>
                </ul>
                <div class="tabcontent history_mo" id="history_mo_content">
                    <? foreach ($historyYearData as $year) {
                        $historyMonthData = getHistoryMonthData($DB, $year);
                        ?>
                        <div id="tab_<?= $year ?>" class="year_detail">
                            <? foreach ($historyMonthData as $month) {
                                $historyData = getHistoryData($DB, $year, $month);
                                ?>
                                <div class="item">
                                    <h3><?= $month ?></h3>
                                    <ol>
                                        <? foreach ($historyData as $data) { ?>
                                            <li><?= $data['content'] ?></li>
                                        <? } ?>
                                    </ol>
                                </div>
                            <? } ?>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
        <!-- mo-history end -->
    </div>
</main>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/footer.php"; ?>
</div>
</body>

</html>