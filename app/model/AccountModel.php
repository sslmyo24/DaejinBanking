<?php
	namespace app\model;
	
	class AccountModel extends DefaultModel {
		function action () {
			extract($_POST);

			switch ($action) {

				// 회게전표에 추가
				case 'account_insert':
					$trndat = $_GET['year']."-".$_GET['month']."-".$_GET['date'];
					$d_idx = $c_idx = 0;
					foreach ($acttyp as $key => $type) {
						if ($actcde[$key] === '') break;
						$more_sql = "";

						// 차변
						if ($type === '1') {
							$d = explode(",", $dramtw[$d_idx]);
							$d = $d[0].$d[1];
							$more_sql = ", dramtw = '{$d}'";
							$d_idx++;

						// 대변
						} else {
							$c = explode(",", $cramtw[$c_idx]);
							$c = $c[0].$c[1];
							$more_sql = ", cramtw = '{$c}'";
							$c_idx++;
						}

						
						$this->querySet("insert", "ktrnmp", "trndat = '{$trndat}', trnseq = '{$trnseq}', actcde = {$actcde[$key]}, acttyp = '{$type}'".$more_sql);
					}
					move(HOME."/account?year=".$_GET['year']."&month=".$_GET['month']."&date=".$_GET['date']);
					break;
			}
		}
	}