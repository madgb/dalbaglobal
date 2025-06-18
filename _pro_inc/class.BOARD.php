<?php
if(REALPATH($_SERVER['SCRIPT_FILENAME']) == REALPATH(__FILE__)){
	echo "<SCRIPT>alert('NO DIRECT SCRIPT ACCESS ALLOWED'); history.back();</SCRIPT>";
	exit;
}

// include_once(realpath(__DIR__ ."/../_pro_inc/class.UTIL.php"));
include_once(realpath(__DIR__ ."/../_pro_inc/class.UPLOAD.php"));

class BOARD {

    private $db;
    private $util;
    private $pageSet;
    private $upload;


    public function __construct(DB $DB) {
        $this->util = new UTIL();
        $this->uplaod = new UPLOAD();
        $this->db = new DB();
    }


    
    public function getBoardList() {
        try {
            $return = [];

            $qu = "SELECT * FROM `tb_board` WHERE bbs_cd ='".$bbsCd." ORDER BY b_idx DESC";
            $re = $this->db->get_results($qu);

            $strList = "";

            if($re['cnt'] > 0) {
                foreach($re['result'] as $rw) {
                    $strList .= "
                    <div class='d-flex justify-content-between align-items-center mb-3 gap-2'>
							<a class='text-truncate' href='/master/customer/customer_list.html'>".$rw['title']."</a>
							<span class='flex-shrink-0'>".$rw['']."</span>
				
                    </div>";
                }
                $return[$bbsCd] = $strList;
                
            }else {
                $strList="
                <div class='d-flex justify-content-between align-items-center mb-3'>
						조회된 내용이 없습니다.
					</div>";
					$return[$bbsCd] = $strList;
            }

        //     $ArrbbsCd = ["notice","qna","guide"];
        //     foreach($ArrbbsCd as $bbsCd){
        //         $qu = "SELECT * FROM `tb_board` WHERE bbs_cd ='".$bbsCd."' ORDER BY b_idx DESC";
        //         }
        //     }
        // }
        } catch(Exception $e) {}
        throw $e;
        return $return;
    }
}
?>