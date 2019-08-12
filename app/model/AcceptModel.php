<?php
	namespace app\model;
	
	class AcceptModel extends DefaultModel {
		function action () {
			extract($_POST);

			switch ($action) {

				// 수납시 회계 전표에 추가
				case 'accept':
					$trnseq = $this->fetch("SELECT trnseq FROM ktrnmp group by trnseq order by trnseq limit 1");
					$trnseq = $trnseq ? $trnseq->trnseq + 1 : 1;

					$amtodr = implode(",", $amtodr); // 스케쥴 회차 목록
					$claim_list = $this->get_list("rntamt, prnamt, intamt, bildat", "kamtmp", "where cntnum = {$_GET['cntnum']} and amtodr in ($amtodr)"); // 회차에 따른 스케쥴 정보 목록
					
					foreach ($claim_list as $data) {
						$this->querySet("insert", "ktrnmp", "trndat = now(), trnseq = {$trnseq}, actcde = 110, acttyp = 1, dramtw = {$data->prnamt}");
						$this->querySet("insert", "ktrnmp", "trndat = now(), trnseq = {$trnseq}, actcde = 901, acttyp = 1, dramtw = {$data->intamt}");
						$this->querySet("insert", "ktrnmp", "trndat = now(), trnseq = {$trnseq}, actcde = 101, acttyp = 2, cramtw = {$data->rntamt}");
						$trnseq++;
					}
					$this->querySet("update", "kamtmp", "recdat = now() where cntnum = '{$_GET['cntnum']}' and amtodr in ({$amtodr})");
					alert("수납되었습니다.");
					move(HOME."/accept");
					break;
			}
		}
	}