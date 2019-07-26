			<h1>여신관리</h1>
			<div id="tab-list">
				<div class="content-tab <?php if (!isset($_GET['clcode'])): ?> chk <?php endif; ?>" data-target="new">신규계약</div>
				<div class="content-tab <?php if (isset($_GET['clcode'])): ?> chk <?php endif; ?>" data-target="update">기존계약</div>
			</div>
			<div id="main-content">
				<div class="content" id="new">
					<h2>신규계약</h2>
					<form method="post">
						<input type="hidden" name="action" value="new_contract">
						<div class="form-input"><span class="data-name">이용자코드</span><input type="number" class="input-text" name="clcode" required autocomplete="off" value="<?php if (isset($_GET['back'])) echo $this->now_data->clcode; else echo $this->member_list[0]->clcode; ?>" min="<?php echo $this->member_list[0]->clcode ?>" max="<?php echo $this->member_list[count($this->member_list) - 1]->clcode ?>"></div>
						<div class="form-input">
							<span class="data-name">계약번호</span><input type="text" class="input-text" name="cntnum" value="<?php echo $this->cntcode ?>" <?php if (isset($_GET['back'])): ?> readonly <?php endif; ?>>
							<span class="data-name">계약상태</span>
							<select type="text" class="input-text" name="cntcls" required>
								<option <?php if (isset($_GET['back']) && $this->now_data->cntcls == 'A'): ?> selected <?php endif; ?> value="A">A</option>
								<option <?php if (isset($_GET['back']) && $this->now_data->cntcls == 'B'): ?> selected <?php endif; ?> value="B">B</option>
							</select>
						</div>
						<div class="form-input">
							<span class="data-name">부점코드</span>
							<select class="input-text" name="cntbrn" required>
							<?php foreach ($this->point_list as $data): ?>
								<option <?php if (isset($_GET['back']) && $this->now_data->cntbrn == $data->cntbrn): ?> selected <?php endif; ?> value="<?php echo $data->cntbrn ?>"><?php echo $data->cntbrn ?> : <?php echo $data->cntnme ?></option>
							<?php endforeach; ?>
							</select>
						</div>
						<div class="form-input"><span class="data-name">계약일</span><input type="date" class="input-text start-date" name="cntdat" required <?php if (isset($_GET['back'])): ?> value="<?php echo $this->now_data->cntdat ?>" <?php endif; ?>>~<span class="data-name">만료일</span><input type="date" class="input-text end-date" name="cntend" required <?php if (isset($_GET['back'])): ?> value="<?php echo $this->now_data->cntend ?>" <?php endif; ?>></div>
						<div class="form-input">
 							<span class="data-name">납입방법</span>
							<select class="input-text" name="rntcal" required>
								<option <?php if (isset($_GET['back']) && $this->now_data->rntcal == '1'): ?> selected <?php endif; ?> value="1">1 : 현금</option>
								<option <?php if (isset($_GET['back']) && $this->now_data->rntcal == '2'): ?> selected <?php endif; ?> value="2">2 : 카드</option>
								<option <?php if (isset($_GET['back']) && $this->now_data->rntcal == '3'): ?> selected <?php endif; ?> value="3">3 : 계좌이체</option>
							</select>
						</div>
						<div class="form-input"><span class="data-name">작업자</span><input type="text" class="input-text" name="userid" required <?php if (isset($_GET['back'])): ?> value="<?php echo $this->now_data->userid ?>" <?php endif; ?>></div>
						<div class="form-input">
							<span class="data-name">여신금액</span><input type="text" class="input-text" name="acqcst" required <?php if (isset($_GET['back'])): ?> value="<?php echo $this->now_data->acqcst ?>" <?php endif; ?>>
							<span class="data-name">기준금리</span>
							<select class="input-text" name="basrat" required>
							<?php foreach ($this->rate_list as $data): ?>
								<option <?php if (isset($_GET['back']) && $this->now_data->basrat == $data->INTRAT ): ?> selected <?php endif; ?> value="<?php echo $data->INTRAT ?>"><?php echo $data->RATCDE ?> : <?php echo $data->RATNME ?> - <?php echo $data->INTRAT ?>%</option>
							<?php endforeach; ?>
							</select>
							<span class="data-name">가산금리</span>
							<input type="text" class="input-text" name="spread" required <?php if (isset($_GET['back'])): ?> value="<?php echo $this->now_data->spread ?>" <?php endif; ?>>
						</div>
						<div class="form-input">
							<span class="data-name">납입주기</span>
							<select type="text" class="input-text" name="amtcyc" required>
								<option <?php if (isset($_GET['back']) && $this->now_data->amtcyc == '1' ): ?> selected <?php endif; ?> value="1">1개월</option>
								<option <?php if (isset($_GET['back']) && $this->now_data->amtcyc == '3' ): ?> selected <?php endif; ?> value="3">3개월</option>
								<option <?php if (isset($_GET['back']) && $this->now_data->amtcyc == '6' ): ?> selected <?php endif; ?> value="6">6개월</option>
							</select>
						</div>
						<button type="<?php if (isset($_GET['back'])): ?>button<?php else: ?>submit<?php endif; ?>" class="submit-button">저장</button>
						<button type="button" class="submit-button" <?php if (isset($_GET['back'])): ?> onclick="location.href = '<?php echo HOME ?>/loan/sch_insert?cntnum=<?php echo $_GET['back'] ?>'" <?php endif; ?>>스케쥴 생성</button>
						<button type="button" class="submit-button">원리금상환스케쥴 조회</button>
					</form>
				</div>
				<div class="content" id="update">
					<h2>기존계약</h2>
					<form method="get">
						<div class="form-input">
							<span class="data-name">이용자코드</span><input type="number" class="input-text" name="clcode" required autocomplete="off" value="<?php if (isset($_GET['clcode'])) echo $this->search_data->clcode; else echo $this->member_list[0]->clcode; ?>" min="<?php echo $this->member_list[0]->clcode ?>" max="<?php echo $this->member_list[count($this->member_list) - 1]->clcode ?>" <?php if (isset($_GET['clcode'])): ?> readonly <?php endif; ?>>
							<button type="submit" class="submit-button">검색</button>
						</div>
					</form>
					<form method="post">
						<input type="hidden" name="action" value="contract_update">
						<div class="form-input">
							<span class="data-name">계약번호</span>
							<?php if (isset($_GET['clcode'])): ?>
							<select name="cntnum" onchange="location.replace('<?php echo HOME ?>/loan?clcode=<?php echo $_GET['clcode'] ?>&cntnum='.$(this).val())">
							<?php foreach ($this->search_list as $data): ?>
								<option value="<?php echo $data->cntnum ?>"><?php echo $data->cntnum ?></option>
							<?php endforeach; ?>
							</select>
							<?php else: ?>
							<input type="text" class="input-text" name="cntnum" readonly>
							<?php endif; ?>
							<span class="data-name">계약상태</span>
							<select type="text" class="input-text" name="cntcls" required>
								<option <?php if (isset($_GET['clcoce']) && $this->search_data->cntcls == 'A'): ?> selected <?php endif; ?> value="A">A</option>
								<option <?php if (isset($_GET['clcoce']) && $this->search_data->cntcls == 'B'): ?> selected <?php endif; ?> value="B">B</option>
							</select>
						</div>
						<div class="form-input">
							<span class="data-name">부점코드</span>
							<select class="input-text" name="cntbrn" required>
							<?php foreach ($this->point_list as $data): ?>
								<option <?php if (isset($_GET['clcode']) && $this->search_data->cntbrn == $data->cntbrn): ?> selected <?php endif; ?> value="<?php echo $data->cntbrn ?>"><?php echo $data->cntbrn ?> : <?php echo $data->cntnme ?></option>
							<?php endforeach; ?>
							</select>
						</div>
						<div class="form-input"><span class="data-name">계약일</span><input type="date" class="input-text start-date" name="cntdat" required <?php if (isset($_GET['clcode'])): ?> value="<?php echo $this->search_data->cntdat ?>" <?php endif; ?>>~<span class="data-name">만료일</span><input type="date" class="input-text end-date" name="cntend" required <?php if (isset($_GET['clcode'])): ?> value="<?php echo $this->search_data->cntend ?>" <?php endif; ?>></div>
						<div class="form-input">
 							<span class="data-name">납입방법</span>
							<select class="input-text" name="rntcal" required>
								<option <?php if (isset($_GET['clcode']) && $this->search_data->rntcal == '1'): ?> selected <?php endif; ?> value="1">1 : 현금</option>
								<option <?php if (isset($_GET['clcode']) && $this->search_data->rntcal == '2'): ?> selected <?php endif; ?> value="2">2 : 카드</option>
								<option <?php if (isset($_GET['clcode']) && $this->search_data->rntcal == '3'): ?> selected <?php endif; ?> value="3">3 : 계좌이체</option>
							</select>
						</div>
						<div class="form-input"><span class="data-name">작업자</span><input type="text" class="input-text" name="userid" required <?php if (isset($_GET['clcode'])): ?> value="<?php echo $this->search_data->userid ?>" <?php endif; ?>></div>
						<div class="form-input">
							<span class="data-name">여신금액</span><input type="text" class="input-text" name="acqcst" required <?php if (isset($_GET['clcode'])): ?> value="<?php echo $this->search_data->acqcst ?>" <?php endif; ?>>
							<span class="data-name">기준금리</span>
							<select class="input-text" name="basrat" required>
							<?php foreach ($this->rate_list as $data): ?>
								<option <?php if (isset($_GET['clcode']) && $this->search_data->basrat == $data->INTRAT ): ?> selected <?php endif; ?> value="<?php echo $data->INTRAT ?>"><?php echo $data->RATCDE ?> : <?php echo $data->RATNME ?> - <?php echo $data->INTRAT ?>%</option>
							<?php endforeach; ?>
							</select>
							<span class="data-name">가산금리</span>
							<input type="text" class="input-text" name="spread" required <?php if (isset($_GET['clcode'])): ?> value="<?php echo $this->search_data->spread ?>" <?php endif; ?>>
						</div>
						<div class="form-input">
							<span class="data-name">납입주기</span>
							<select type="text" class="input-text" name="amtcyc" required>
								<option <?php if (isset($_GET['clcode']) && $this->search_data->amtcyc == '1' ): ?> selected <?php endif; ?> value="1">1개월</option>
								<option <?php if (isset($_GET['clcode']) && $this->search_data->amtcyc == '3' ): ?> selected <?php endif; ?> value="3">3개월</option>
								<option <?php if (isset($_GET['clcode']) && $this->search_data->amtcyc == '6' ): ?> selected <?php endif; ?> value="6">6개월</option>
							</select>
						</div>
						<button type="button" class="submit-button" onclick="location.replace('<?php echo HOME ?>/loan/contract_delete?cntnum=<?php echo $this->search_data->cntnum ?>')">삭제</button>
						<button type="submit" class="submit-button">수정</button>
					</form>
				</div>
			</div>