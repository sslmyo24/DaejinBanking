		<h1>청구관리</h1>
		<div id="main-content">
		<?php if (!isset($_GET['start_date'])): ?>
			<form method="get">
				<h2>청구서 생성</h2>
				<div style="margin: 20px 0"><input type="date" class="start-date" name="start_date"> ~ <input type="date" class="end-date" name="end_date"></div>
				<button type="submit" class="submit-button">생성</button>
			</form>
		<?php else: ?>
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
					<tr>
						<td>홍길동</td>
						<td>111-2233447</td>
						<td>2015/12/20</td>
						<td>1,000,000</td>
						<td></td>
					</tr>
					<tr>
						<td>홍길동</td>
						<td>111-2233447</td>
						<td>2015/12/20</td>
						<td>1,000,000</td>
						<td></td>
					</tr>
					<tr>
						<td>홍길동</td>
						<td>111-2233447</td>
						<td>2015/12/20</td>
						<td>1,000,000</td>
						<td></td>
					</tr>
					<tr>
						<td>홍길동</td>
						<td>111-2233447</td>
						<td>2015/12/20</td>
						<td>1,000,000</td>
						<td></td>
					</tr>
				</tbody>
			</table>
		<?php endif; ?>
		</div>