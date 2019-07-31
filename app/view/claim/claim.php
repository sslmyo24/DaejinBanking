		<h1>청구관리</h1>
		<div id="main-content">
		<?php if (isset($_GET['start_date'])): ?>
			<table cellspacing="0" class="list-table">
				<caption>청구서리스트</caption>
				<colgroup>
					<col width="20%">
					<col width="20%">
					<col width="20%">
					<col width="20%">
					<col width="20%">
				</colgroup>
				<thead>
					<tr>
						<th>이용자명</th>
						<th>계약번호</th>
						<th>납입일</th>
						<th>청구금액</th>
						<th>청구여부</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($this->contract_list as $data): ?>
					<tr>
						<td><?php echo $data->clhnme ?></td>
						<td><?php echo $data->cntnum ?></td>
						<td><?php echo $data->amtdue ?></td>
						<td><?php echo number_format($data->rntamt) ?></td>
						<td><?php if ($data->bildat !== '0000-00-00'): ?>청구 완료<?php endif; ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			<button type="button" class="submit-button" style="display: block; margin: 50px auto;" onclick="location.replace('<?php echo HOME ?>/claim')">이전으로</button>
		<?php else: ?>
			<h2 style="font-size: 17px">청구서 생성</h2>
			<form method="post" style="margin-top: 40px">
				<input type="hidden" name="action" value="claim_insert">
				<div style="margin: 20px 0"><input type="date" class="start-date" name="start_date"> ~ <input type="date" class="end-date" name="end_date"></div>
				<button type="submit" class="submit-button">생성</button>
				<button type="button" class="submit-button" id="search-button">조회</button>
			</form>
		<?php endif; ?>
		</div>
		<script>
			$(`#search-button`).click(function(event) {
				const startDate = $(`.start-date`).val();
				const endDate = $(`.end-date`).val();
				location.replace(`<?php echo HOME ?>/claim?start_date=${startDate}&end_date=${endDate}`);
			});
		</script>