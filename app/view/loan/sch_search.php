		<h1>여신관리</h1>
		<div id="main-content">
			<h2 style="text-align: center; margin: 30px 0;">원리금상환스케쥴</h2>
			<table cellspacing="0" class="list-table">
				<thead>
					<tr>
						<th>상환방법</th>
						<th>대출원금</th>
						<th>대출기간</th>
						<th>대출금리</th>
						<th>상환금(원금+이자)</th>
						<th>총이자</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>원금균등분할상환</td>
						<td><?php echo number_format($this->contract_data->acqcst) ?>원</td>
						<td align="center"><?php echo $this->contract_data->cntpym*$this->contract_data->amtcyc ?>개월</td>
						<td align="right"><?php echo $this->contract_data->rntrat ?>%</td>
						<td><?php echo number_format($this->sch_data->rntamt) ?>원</td>
						<td><?php echo number_format($this->sch_data->int_sum) ?>원</td>
					</tr>
				</tbody>
			</table>
			<div id="table-wrap" style="width: 50%; margin: 0 auto; height: 350px; overflow: auto;">
				<table cellspacing="0" class="list-table" style="width: 100%;">
					<thead>
						<tr>
							<th>회차</th>
							<th>총상환금(원금+이자)</th>
							<th>상환원금</th>
							<th>이자</th>
							<th>납입원금합계</th>
							<th>잔금</th>
						</tr>
					</thead>
					<tbody>
					<?php $sum = 0; ?>
					<?php foreach ($this->sch_list as $data): ?>
						<?php $sum += $data->prnamt ?>
						<tr>
							<td><?php echo number_format($data->amtodr) ?></td>
							<td><?php echo number_format($data->rntamt) ?>원</td>
							<td><?php echo number_format($data->prnamt) ?>원</td>
							<td><?php echo number_format($data->intamt) ?>원</td>
							<td><?php echo number_format($sum) ?>원</td>
							<td><?php echo number_format($data->prnmal) ?>원</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<button type="button" class="submit-button" style="margin: 30px auto; display: block;" onclick="history.back();">이전으로</button>
		</div>