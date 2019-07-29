<?php
	namespace app\model;
	
	class AcceptModel extends DefaultModel {
		function action () {
			extract($_POST);

			switch ($action) {
				case 'accept':
					$trnseq = $this->fetch("SELECT trnseq FROM ktrnmp group by trnseq order by trnseq limit 1");
					$trnseq = $trnseq ? $trnseq->trnseq + 1 : 1;
					$amtodr = implode(",", $amtodr);
					$claim_list = $this->get_list("rntamt, prnamt, intamt, bildat", "kamtmp", "where cntnum = {$_GET['cntnum']} and amtodr in ($amtodr)");
					foreach ($claim_list as $data) {
						$this->querySet("insert", "ktrnmp", "trndat = now(), trnseq = {$trnseq}, actcde = 110, acttyp = 1, dramtw = {$data->prnamt}, reqdat = {$data->bildat}");
						$this->querySet("insert", "ktrnmp", "trndat = now(), trnseq = {$trnseq}, actcde = 901, acttyp = 1, dramtw = {$data->intamt}, reqdat = {$data->bildat}");
						$this->querySet("insert", "ktrnmp", "trndat = now(), trnseq = {$trnseq}, actcde = 101, acttyp = 2, cramtw = {$data->rntamt}, reqdat = {$data->bildat}");
						$trnseq++;
					}
					$this->querySet("update", "kamtmp", "recdat = now() where cntnum = '{$_GET['cntnum']}' and amtodr in ({$amtodr})");
					alert("수납되었습니다.");
					move(HOME."/accept");
					break;
			}
		}
	}