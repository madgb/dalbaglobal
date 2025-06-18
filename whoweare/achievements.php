<?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/header.php"; ?>
<?php
    $quOpt = " SELECT * FROM tb_achievement_info WHERE b_idx = 1";
    $reOpt = $DB->get_results($quOpt);
  
    if($reOpt['cnt'] > 0){
      foreach ($reOpt['result'] as $rwOpt) {
        $opt = $rwOpt;
      }
    }

    $query = " SELECT * FROM tb_board_info WHERE bbs_cd = 'achievements' ORDER BY w_year ASC";
    $result = $DB->get_results($query);
    $posts = [];

    foreach ($result['result'] as $row) {
        $post = [
            'year' => htmlspecialchars($row['w_year']),
            'sales' => htmlspecialchars($row['subject'])
        ];
        $posts[] = $post;
    }
    foreach ($posts as $post) {
        $fullLabels[] = $post['year']; // year 데이터를 fullLabels에 추가
        $fullData[] = $post['sales']; // sales 데이터를 fullData에 추가
    }
?>
<!-- chartjs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<main class="main">
    <div id="fullpage">
        <div class="section">
            <div class="achieve_korea">
                <h1>Achievements</h1>
                <div class="achieve_box">
                    <div class="item">
                        <p><?echo $Accumulated?></p>
                        <h2>   
                          
                            <span class="num"><?=$opt['profit']?></span><?echo $million?> +
                        </h2>
                    </div>
                    <div class="item">
                        <p><?echo $Accumulated_Overs?></p>
                        <h2><span class="num"><?=$opt['export']?></span><?echo $million_b?> +</h2>
                    </div>
                    <div class="item">
                        <p><?echo $Spray_Serums_Total?></p>
                        <h2><span class="num_B"><?=$opt['cerum_sales']?></span><?echo $M_units?></h2>
                    </div>
                    <div class="item">
                        <p><?echo $Sales_CAGR?></p>
                        <h2><span class="num"><?=$opt['growth']?></span>%</h2>
                    </div>
                </div>
                <div class="canvas_box"><canvas id="canvas" class="korea_chart" width="1100"></canvas></div>
            </div>
        </div>
        <div class="section">
            <div class="global_inner russia">
              <div class="achieve_global">
                <h2>Achievements</h2>
                <span class="sub_txt">Global Business Growth CAGR 167%</span>
                <div class="global_img">
                    <?if($_SESSION['lang'] == 'EN') { ?>
                        <img src="../_img/common/russia_global_en.png" alt="" class="pc_show" />
                        <img src="../_img/common/russia_global_en_mo.png" alt="" class="mo_show" />
                        <? } else { ?>
                            <img src="../_img/common/russia_global.png" alt="" class="pc_show" />
                            <img src="../_img/common/russia_global_mo.png" alt="" class="mo_show" />
                    <? } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="section">
            <div class="global_inner europe">
              <div class="achieve_global">
                <h2>Achievements</h2>
                <span class="sub_txt">Global Business Growth CAGR 831%</span>
                <div class="global_img">
                    <?if($_SESSION['lang'] == 'EN') { ?>
                        <img src="../_img/common/europe_global_en.png" alt="" class="pc_show" />
                        <img src="../_img/common/europe_global_en_mo.png" alt="" class="mo_show" />
                        <? } else { ?>                  
                            <img src="../_img/common/europe_global.png" alt="" class="pc_show" />
                            <img src="../_img/common/europe_global_mo.png" alt="" class="mo_show" />
                    <? } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="section">
            <div class="global_inner japan">
              <div class="achieve_global">
                <h2>Achievements</h2>
                <span class="sub_txt">Global Business Growth CAGR 335%</span>
                <div class="global_img">
                    <?if($_SESSION['lang'] == 'EN') { ?>
                        <img src="../_img/common/japan_global_en.png" alt="" class="pc_show" />
                        <img src="../_img/common/japan_global_en_mo.png" alt="" class="mo_show" />
                        <? } else { ?>                  
                            <img src="../_img/common/japan_global.png" alt="" class="pc_show" />
                            <img src="../_img/common/japan_global_mo.png" alt="" class="mo_show" />
                    <? } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="section">
            <div class="global_inner america">
              <div class="achieve_global">
                <h2>Achievements</h2>
                <span class="sub_txt">Global Business Growth CAGR 165%</span>
                <div class="global_img">
                    <?if($_SESSION['lang'] == 'EN') { ?>
                        <img src="../_img/common/america_global_en.png" alt="" class="pc_show" />
                        <img src="../_img/common/america_global_en_mo.png" alt="" class="mo_show" />
                        <? } else { ?>                  
                            <img src="../_img/common/america_global.png" alt="" class="pc_show" />
                            <img src="../_img/common/america_global_mo.png" alt="" class="mo_show" />
                    <? } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="section">
            <div class="global_inner ASEAN">
              <div class="achieve_global">
                <h2>Achievements</h2>
                <span class="sub_txt">Global Business Growth CAGR 620%</span>
                <div class="global_img">   
                    <?if($_SESSION['lang'] == 'EN') { ?>
                        <img src="../_img/common/ASEAN_global_en.png" alt="" class="pc_show" />
                        <img src="../_img/common/ASEAN_global_en_mo.png" alt="" class="mo_show" />
                        <? } else { ?>                  
                            <img src="../_img/common/ASEAN_global.png" alt="" class="pc_show" />
                            <img src="../_img/common/ASEAN_global_mo.png" alt="" class="mo_show" />
                    <? } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="section">
            <div class="global_inner china">
              <div class="achieve_global">
                <h2>Achievements</h2>
                <span class="sub_txt">Global Business Growth CAGR 1,339%</span>
                <div class="global_img">  
                    <?if($_SESSION['lang'] == 'EN') { ?>
                        <img src="../_img/common/china_global_en.png" alt="" class="pc_show" />
                        <img src="../_img/common/china_global_en_mo.png" alt="" class="mo_show" />
                        <? } else { ?>                  
                            <img src="../_img/common/china_global.png" alt="" class="pc_show" />
                            <img src="../_img/common/china_global_mo.png" alt="" class="mo_show" />
                    <? } ?>
                </div>
              </div>
            </div>
          </div>

        <div class="section fp-auto-height section_footer">
            <?php include $_SERVER["DOCUMENT_ROOT"] . "/_pro_inc/footer.php"; ?>
        </div>
    </div>
</main>
</div>
</body>
<script>
    new fullpage("#fullpage", {
        autoScrolling: true,
        scrollHorizontally: true,
        scrollOverflow: true,
        autoScrolling: true,
        fitToSection: true,
    });

    $(function () {
        $(".num").each(function () {
            $(this)
                .prop("Counter", 0)
                .animate(
                    {
                        Counter: $(this).text(),
                    },
                    {
                        duration: 3000,
                        easing: "swing",
                        step: function (now) {
                            $(this).text(Math.ceil(now));
                        },
                    }
                );
        });
    });
    $(function () {
        $(".num_B").each(function () {
            const $this = $(this);
            const targetNum = parseInt($this.text().replace(/,/g, ""), 10); // 콤마 제거

            $this.prop("Counter", 0).animate(
                {
                    Counter: targetNum,
                },
                {
                    duration: 3000,
                    easing: "swing",
                    step: function (now) {
                        $this.text(Math.ceil(now).toLocaleString()); // 콤마 추가해서 출력
                    },
                }
            );
        });
    });

    // canvas
    const isMobile = window.innerWidth <= 768;
    const fullLabels = <?= json_encode($fullLabels) ?>;
    const fullData = <?= json_encode($fullData) ?>;
    
    // ✅ 모바일이면 앞 5개만 보여주기
    const labels = isMobile ? fullLabels.slice(-5) : fullLabels;
    const data = isMobile ? fullData.slice(-5) : fullData;
    const dataLength = fullData.length;
    Chart.register(ChartDataLabels);

    // ✅ 중앙 원형 마커 플러그인 (안쪽 점 제거됨)
    const CirclePlugin = {
        id: "drawCircles",
        afterDatasetDraw(chart, args) {
            const { ctx } = chart;
            const meta = args.meta;
            const isMobile = window.innerWidth <= 768;
            const threshold = dataLength - 2;

            meta.data.forEach((bar) => {
                const index = meta.data.indexOf(bar);
                const x = bar.x;
                const y = bar.y + (bar.base - bar.y) / 500;

                // 바깥 원만 그리기
                ctx.beginPath();
                ctx.arc(x, y, isMobile ? 6 : 10, 0, Math.PI * 2);
                ctx.fillStyle = "#fff";
                ctx.fill();
                ctx.lineWidth = 2;
                // ctx.strokeStyle = "#ccc";

                ctx.strokeStyle = index >= threshold ? "#FFE32D" : "#ccc";
                ctx.stroke();

                // ❌ 안쪽 점 제거됨
            });
        },
    };

    const ctx = document.getElementById("canvas").getContext("2d");
    new Chart(ctx, {
        type: "bar",
        data: {
            // labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023", "2024(e)", "2025(f)"],
            labels: labels,
            datasets: [
                {
                    // data: [0.4, 5, 35, 230, 470, 690, 1450, 2010, 3090, 4000],
                    data: data,
                    backgroundColor: function (context) {
                        const index = context.dataIndex;
                        const { ctx, chartArea } = context.chart;
                        if (!chartArea) return null;

                        // ✅ 2024~2025: 노랑 계열 그라데이션 (하단 밝음 → 상단 진함)
                        if (!isMobile && index >= dataLength - 2) {
                            const gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
                            gradient.addColorStop(0, "#FFDD0000"); // 하단: 밝은 노랑
                            // gradient.addColorStop(0.5, "#FFDD00"); // 중간
                            gradient.addColorStop(1, "#FFDD00"); // 상단: 진한 주황 노랑
                            return gradient;
                        } else if (isMobile && index >= dataLength - 2) {
                            const gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
                            gradient.addColorStop(0, "#FFDD0000"); // 하단: 밝은 노랑
                            // gradient.addColorStop(0.5, "#FFDD00"); // 중간
                            gradient.addColorStop(1, "#FFDD00"); // 상단: 진한 주황 노랑
                            return gradient;
                        }
                        // ✅ 2016~2023: 회색 그라데이션 (하단 밝음 → 상단 진함)
                        const grayGradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
                        grayGradient.addColorStop(0, "#D7D7D700"); // 하단: 연회색
                        grayGradient.addColorStop(0.2, "#D7D7D7"); // 하단: 연회색
                        grayGradient.addColorStop(1, "#D7D7D7"); // 상단: 진회색
                        return grayGradient;
                    },
                    borderRadius: {
                        topLeft: 100,
                        topRight: 100,
                        bottomLeft: 0,
                        bottomRight: 0,
                    },
                    borderSkipped: false,
                },
            ],
        },
        options: {
            layout: {
                padding: {
                    top: 30,
                },
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    enabled: false, // 툴팁 비활성화
                },
                datalabels: {
                    anchor: "end",
                    align: "end",
                    offset: 3,
                    color: function (context) {
                        const index = context.dataIndex;
                        const isMobile = window.innerWidth <= 768;
                        if (!isMobile) {
                            // ✅ 모바일이 아닐 때
                            return index >= dataLength - 2 ? "#FFCB3B" : "#999";
                        } else {
                            // ✅ 모바일일 때
                            return index >= dataLength - 2 ? "#FFCB3B" : "#999";
                        }
                    },
                    font: function () {
                        const isMobile = window.innerWidth <= 768;
                        return {
                            weight: "bold",
                            size: isMobile ? 14 : 20,
                            family: "'Pretendard'",
                        };
                    },
                    formatter: (value) => value + "억",
                },
            },
            scales: {
                y: { display: false },
                x: {
                    ticks: {
                        color: function (context) {
                            const index = context.index;
                            const isMobile = window.innerWidth <= 768;

                            if (!isMobile) {
                                return index >= dataLength - 2 ? "#FFCB3B" : "#999";
                            } else {
                                return index >= dataLength - 2 ? "#FFCB3B" : "#999";
                            }
                        },
                        font: function () {
                            const isMobile = window.innerWidth <= 768;
                            return {
                                size: isMobile ? 12 : 16,
                                family: "'Pretendard'",
                            };
                        },
                        padding: 16,
                    },
                    grid: { display: false },
                },
            },
        },
        plugins: [ChartDataLabels, CirclePlugin],
    });
    window.addEventListener("resize", () => {
        location.reload(); // 가장 간단한 방법: 새로고침
    });
</script>

</html>