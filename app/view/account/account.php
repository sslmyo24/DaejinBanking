		<h1>회계관리</h1>
		<div id="main-content">
			<h2 style="text-align: center;">회계전표</h2>
			<form method="get" style="width: 700px; margin: 30px auto">
				<select class="input-text" name="year">
				</select>
				년
				<select class="input-text" name="month">
				</select>
				월
				<select class="input-text" name="date">
				</select>
				일
				<button class="submit-button">검색</button>
			</form>
			<table cellspacing="0" class="list-table">
				<thead>
					<tr>
						<th>번호</th>
						<th>구분</th>
						<th>코드</th>
						<th>계정과목</th>
						<th>차변</th>
						<th>대변</th>
					</tr>
				</thead>
				<tbody>
			<?php if (isset($_GET['year'])): ?>
				<?php foreach ($this->account_list as $data): ?>
					<tr>
						<td><?php echo $data->trnseq ?></td>
						<td><?php echo $data->acttyp == 1 ? '차변' : '대변' ?></td>
						<td><?php echo $data->actcde ?></td>
						<td><?php echo $data->actnme ?></td>
						<td><?php if ($data->acttyp == 1) echo number_format($data->dramtw); ?></td>
						<td><?php if ($data->acttyp == 2) echo number_format($data->cramtw); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
				</tbody>
			</table>
		</div>
	<script>


		$(document).ready(function() {
			const date = new Date();
			const year = date.getFullYear();
			for (let i = year - 6; i <= year; i++) $(`select[name="year"]`).append(`<option value="${i}">${i}</option>`);
			for (let i = 1; i <= 12; i++) $(`select[name="month"]`).append(`<option value="${i}">${i}</option>`);

			const setDate = _ => {
				$(`select[name="date"] > option`).remove();
				const month = $(`select[name="month"]`).val()*1;
				const date = month === 2 ? 29 : [1,3,5,7,8,10,12].indexOf(month) !== -1 ? 31 : 30;
				for (let i = 1; i <= date; i++) $(`select[name="date"]`).append(`<option value="${i}">${i}</option>`);
			}

			setDate();

			$(`select[name="month"]`).change(setDate);
		});

	</script>