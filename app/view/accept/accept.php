		<h1>수납관리</h1>
		<div id="main-content">
			<form method="get" style="display: block; margin: 0 auto; width: 400px;">
				<div class="form-input">
					<span class="data-name">계약번호</span>
					<input type="text" name="cntnum" class="input-text">
					<button class="submit-button" type="submit">검색</button>
				</div>
			</form>
			<form method="post">
				<input type="hidden" name="action" value="accept">
				<table cellspacing="0" class="list-table">
					<colgroup>
						<col width="16.67%">
						<col width="16.67%">
						<col width="16.67%">
						<col width="16.67%">
						<col width="16.67%">
						<col width="16.67%">
					</colgroup>
					<thead>
						<tr>
							<th>이용자명</th>
							<th>계약번호</th>
							<th>회차</th>
							<th>납입일</th>
							<th>납입금액</th>
							<th>수납금액</th>
						</tr>
					</thead>
					<tbody>
				<?php if (isset($_GET['cntnum'])): ?>
					<?php foreach ($this->claim_list as $data): ?>
						<input type="hidden" name="amtodr[]" value="<?php echo $data->amtodr ?>">
						<tr>
							<td><?php echo $data->clhnme ?></td>
							<td><?php echo $_GET['cntnum'] ?></td>
							<td><?php echo $data->amtodr ?></td>
							<td><?php echo $data->amtdue ?></td>
							<td><?php echo number_format($data->rntamt) ?></td>
							<td><input type="text"></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
					</tbody>
				</table>
				<button type="submit" class="submit-button" style="display: block; margin: 50px auto">수납처리</button>
			</form>