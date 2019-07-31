<h1>회계관리</h1>
<div id="main-content">
	<h2 style="text-align: center;">회계전표</h2>
	<form method="get" style="width: 700px; margin: 30px auto">
		<select class="input-text" name="year" v-model="year">
			<option v-for="n in 6" :value="endYear - n + 1" :key="n" v-html="endYear - n + 1" />
		</select>
		년
		<select class="input-text" name="month" v-model="month">
			<option v-for="n in 12" :value="n" :key="n" v-html="n" />
		</select>
		월
		<select class="input-text" name="date" @change="setDate">
			<option v-for="n in endDate" :value="n" :key="n" v-html="n" />			
		</select>
		일
		<button class="submit-button">검색</button>
	</form>
	<?php if (isset($_GET['year'])): ?>
	<form method="post" id="account-form" @submit="chkTotal($event)">
		<input type="hidden" name="action" value="account_insert">
		<input type="hidden" name="trnseq" value="<?php echo $this->next_seq ?>">
		<div style="height: 300px; overflow-y: auto">
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
						<th>번호</th>
						<th>구분</th>
						<th>코드</th>
						<th>계정과목</th>
						<th>차변</th>
						<th>대변</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(v, k) in beforeList" :key="`before${k}`">
						<td v-html="v.trnseq" />
						<td v-html="~~v.acttyp === 1 ? '차변' : '대변'" />
						<td v-html="v.actcde" />
						<td v-html="v.actnme" />
						<td><span v-if="~~v.acttyp === 1" v-html="numberFormat(v.dramtw)"></td>
						<td><span v-if="~~v.acttyp === 2" v-html="numberFormat(v.cramtw)"></td>
					</tr>
					<tr v-for="(v, k) in list" :key="`after${k}`">
						<td v-html="v.trnseq"></td>
						<td>
							<select v-model="v.acttyp" name="acttyp[]">
								<option value="1">차변</option>
								<option value="2">대변</option>
							</select>
						</td>
						<td><input type="text" name="actcde[]" v-model="v.actcde" @change="searchCode(v)"></td>
						<td><input type="text" v-model="v.actnme"></td>
						<td><input type="text" name="dramtw[]" v-if="~~v.acttyp === 1" :value="numberFormat(v.dramtw)" @keydown.enter="listAppend($event, v)"></td>
						<td><input type="text" name="cramtw[]" v-if="~~v.acttyp === 2" :value="numberFormat(v.cramtw)" @keydown.enter="listAppend($event, v)"></td>
					</tr>
					<tr>
						<td>합계</td>
						<td></td>
						<td></td>
						<td></td>
						<td v-html="numberFormat(total[0])"></td>
						<td v-html="numberFormat(total[1])"></td>
					</tr>
				</tbody>
			</table>
		</div>
		<button class="submit-button" type="submit" style="display: block; margin: 30px auto;">추가</button>
	</form>
	<?php endif; ?>
</div>
<script>
<?php if (isset($_GET['year'])): ?>
	const beforeList = JSON.parse(`<?php echo json_encode($this->account_list) ?>`);
	const newObj = {	
		trnseq: '<?php echo $this->next_seq?>',
		acttyp: 1,
		actcde: '',
		actnme: '',
		dramtw: 0,
		cramtw: 0
	}
<?php endif; ?>
	const year = <?php echo date("Y")?>;
	const VApp = new Vue({
		el:'#main-content',
		data: {
			year,
			month: 1,
			date: 1,
			endYear: year,
			endDate: 30,
<?php if (isset($_GET['year'])): ?>
			actList: JSON.parse(`<?php echo json_encode($this->act_list)?>`),
			beforeList: [...beforeList],
			list: [
				{...newObj}
			],
<?php endif; ?>
			total: [0,0]
		},
		created () {
			this.setDate()
			this.setTotal()
		},
		methods: {
			setDate () {
				this.endDate = this.month === 2 ? 29 : [1,3,5,7,8,10,12].indexOf(this.month) !== -1 ? 31 : 30		
			},
			searchCode (v) {
				v.actnme = this.actList.find((value, key) => value.actcde === v.actcde).actnme
			},
			listAppend (e, v) {
				e.preventDefault()
				if (~~e.target.value === 0) {
					return
				}
				~~v.acttyp === 1 ? (v.dramtw = e.target.value) : (v.cramtw = e.target.value)
				this.list.push({...newObj})
				this.setTotal()
			},
			setTotal () {
				const newList = [...this.beforeList, ...this.list]
				const total1 = newList.filter(v => ~~v.dramtw > 0).map(v => v.dramtw).reduce((x, y) => ~~x + ~~y)
				const total2 = newList.filter(v => ~~v.cramtw > 0).map(v => v.cramtw).reduce((x, y) => ~~x + ~~y)
				this.total = [total1, total2]
			},
			numberFormat,
			chkTotal (e) {
				e.preventDefault();
				if (this.total[0] !== this.total[1]) {
					alert('차변의 합과 대변의 합이 같아야 합니다.');
					return;
				}
				e.target.submit();
			}
		}
	})
</script>