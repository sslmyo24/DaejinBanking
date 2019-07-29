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
						<th>청구서</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($this->contract_list as $data): ?>
					<tr>
						<td><?php echo $data->clhnme ?></td>
						<td><?php echo $data->cntnum ?></td>
						<td><?php echo $data->amtdue ?></td>
						<td><?php echo number_format($data->rntamt) ?></td>
						<td><input type="text" <?php if ($data->bildat == null): ?> onchange="if ($(this).val() === 'Yes') location.replace('<?php echo HOME ?>/claim?cntnum=<?php echo $data->cntnum ?>&amtodr=<?php echo $data->amtodr ?>')" <?php else: ?> value="Yes" readonly <?php endif; ?>></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<h2 style="font-size: 17px">청구서 생성</h2>
			<form <?php if (isset($_GET['cntnum'])): ?>method="post"<?php else: ?>method="get"<?php endif; ?> style="margin-top: 40px">
				<?php if (isset($_GET['cntnum'])): ?>
				<input type="hidden" name="action" value="claim_insert">
				<div class="form-input">
					<span class="data-name">고객명</span>
					<input type="text" class="input-text" disabled name="clhnme" value="<?php echo $this->contract_data->clhnme ?>">
				</div>
				<div class="form-input">
					<span class="data-name">계약번호</span>
					<input type="text" class="input-text" disabled name="cntnum" value="<?php echo $this->contract_data->cntnum ?>">
				</div>
				<div class="form-input">
					<span class="data-name">납입일</span>
					<input type="text" class="input-text" disabled name="amtdue" value="<?php echo $this->contract_data->amtdue ?>">
				</div>
				<div class="form-input">
					<span class="data-name">청구금액</span>
					<input type="text" class="input-text" disabled name="amtdue" value="<?php echo number_format($this->contract_data->rntamt) ?>">
				</div>
				<div class="form-input">
					<span class="data-name">고객주소</span>
					<input type="text" class="input-text" disabled name="amtdue" value="<?php echo $this->contract_data->cladrs ?>">
				</div>
				<?php else: ?>
				<div style="margin: 20px 0"><input type="date" class="start-date" name="start_date"> ~ <input type="date" class="end-date" name="end_date"></div>
				<?php endif; ?>
				<button type="submit" class="submit-button">생성</button>
			</form>
		<?php endif; ?>
		</div>