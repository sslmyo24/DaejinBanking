			<h1>여신관리</h1>
			<div id="tab-list">
				<div class="content-tab chk" data-target="new">신규계약</div>
				<div class="content-tab" data-target="update">기존계약</div>
			</div>
			<div id="main-content">
				<div class="content" id="new">
					<h2>신규계약</h2>
					<form method="post">
						<input type="hidden" name="action" value="new_contract">
						<div class="form-input"><span class="data-name">이용자코드</span><input type="number" class="input-text" name="clcode" required autocomplete="off" min="<?php echo $this->member_list[0]->clcode ?>" max="<?php echo $this->member_list[count($this->member_list) - 1]->clcode ?>"></div>
						<div class="form-input">
							<span class="data-name">계약번호</span><input type="text" class="input-text" name="cntnum" readonly value="<?php echo $this->next_code ?>">
							<span class="data-name">계약상태</span>
							<select type="text" class="input-text" name="cntcls" required>
								<option value="A">A</option>
								<option value="B">B</option>
							</select>
						</div>
						<div class="form-input">
							<span class="data-name">부점코드</span>
							<select class="input-text" name="cntbrn" required>
							<?php foreach ($this->point_list as $data): ?>
								<option value="<?php echo $data->cntbrn ?>"><?php echo $data->cntbrn ?> : <?php echo $data->cntnme ?></option>
							<?php endforeach; ?>
							</select>
						</div>
						<div class="form-input"><span class="data-name">계약일</span><input type="date" class="input-text start-date" name="cntdat" required>~<span class="data-name">만료일</span><input type="date" class="input-text end-date" name="cntend" required></div>
						<div class="form-input">
							<span class="data-name">거치기간유무</span>
							<select class="input-text" name="grkey" required>
								<option value="Y">Y</option>
								<option value="N">N</option>
							</select>
							<span class="data-name">납입방법</span>
							<select class="input-text" name="rntcal" required>
								<option value="1">1 : 현금</option>
								<option value="2">2 : 카드</option>
								<option value="3">3 : 계좌이체</option>
							</select>
						</div>
						<div class="form-input"><span class="data-name">작업자</span><input type="text" class="input-text" name="userid" required></div>
						<div class="form-input">
							<span class="data-name">여신금액</span><input type="text" class="input-text" name="acqcst" required>
							<span class="data-name">기준금리</span>
							<select class="input-text" name="basrat" required>
							<?php foreach ($this->rate_list as $data): ?>
								<option value="<?php echo $data->RATCDE ?>"><?php echo $data->RATCDE ?> : <?php echo $data->RATNME ?> - <?php echo $data->INTRAT ?>%</option>
							<?php endforeach; ?>
							</select>
						</div>
						<div class="form-input">
							<span class="data-name">납입주기</span>
							<select type="text" class="input-text" name="grfrq" required>
								<option value="1">1개월</option>
								<option value="3">3개월</option>
								<option value="6">6개월</option>
								<option value="12">12개월</option>
							</select>
						</div>
						<button type="submit" class="submit-button">등록</button>
					</form>
				</div>
				<div class="content" id="update">
					<h2>기존계약</h2>
					<form method="post">
						<input type="hidden" name="action" value="old_contract_update">
						<div class="form-input"><span class="data-name">이용자코드</span><input type="number" class="input-text" name="clcode" required autocomplete="off" min="<?php echo $this->member_list[0]->clcode ?>" max="<?php echo $this->member_list[count($this->member_list) - 1]->clcode ?>"></div>
						<div class="form-input">
							<span class="data-name">계약번호</span><input type="text" class="input-text" name="cntnum" readonly value="<?php echo $this->next_code ?>">
							<span class="data-name">계약상태</span>
							<select type="text" class="input-text" name="cntcls" required>
								<option value="A">A</option>
								<option value="B">B</option>
							</select>
						</div>
						<div class="form-input">
							<span class="data-name">부점코드</span>
							<select class="input-text" name="cntbrn" required>
							<?php foreach ($this->point_list as $data): ?>
								<option value="<?php echo $data->cntbrn ?>"><?php echo $data->cntbrn ?> : <?php echo $data->cntnme ?></option>
							<?php endforeach; ?>
							</select>
						</div>
						<div class="form-input"><span class="data-name">계약일</span><input type="date" class="input-text start-date" name="cntdat" required>~<span class="data-name">만료일</span><input type="date" class="input-text end-date" name="cntend" required></div>
						<div class="form-input">
							<span class="data-name">거치기간유무</span>
							<select class="input-text" name="grkey" required>
								<option value="Y">Y</option>
								<option value="N">N</option>
							</select>
							<span class="data-name">납입방법</span>
							<select class="input-text" name="rntcal" required>
								<option value="1">1 : 현금</option>
								<option value="2">2 : 카드</option>
								<option value="3">3 : 계좌이체</option>
							</select>
						</div>
						<div class="form-input"><span class="data-name">작업자</span><input type="text" class="input-text" name="userid" required></div>
						<div class="form-input">
							<span class="data-name">여신금액</span><input type="text" class="input-text" name="acqcst" required>
							<span class="data-name">기준금리</span>
							<select class="input-text" name="basrat" required>
							<?php foreach ($this->rate_list as $data): ?>
								<option value="<?php echo $data->RATCDE ?>"><?php echo $data->RATCDE ?> : <?php echo $data->RATNME ?> - <?php echo $data->INTRAT ?>%</option>
							<?php endforeach; ?>
							</select>
						</div>
						<div class="form-input">
							<span class="data-name">납입주기</span>
							<select type="text" class="input-text" name="grfrq" required>
								<option value="1">1개월</option>
								<option value="3">3개월</option>
								<option value="6">6개월</option>
								<option value="12">12개월</option>
							</select>
						</div>
						<button type="submit" class="submit-button">등록</button>
					</form>
				</div>
			</div>