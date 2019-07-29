<h1>고객관리</h1>
<div id="tab-list">
	<div class="content-tab <?php if (!isset($_GET['clcode'])): ?> chk <?php endif; ?>" data-target="new">신규고객</div>
	<div class="content-tab <?php if (isset($_GET['clcode'])): ?> chk <?php endif; ?>" data-target="update">기존고객</div>
</div>
<div id="main-content">
	<div class="content" id="new">
		<h2>신규고객</h2>
		<form method="post">
			<input type="hidden" name="action" value="new_member">
			<div class="form-input"><span class="data-name">이용자코드</span><input type="text" class="input-text" name="clcode" readonly value="<?php echo $this->next_code ?>"></div>
			<div class="form-input"><span class="data-name">이용자명</span><input type="text" class="input-text" name="clhnme" required></div>
			<div class="form-input"><span class="data-name">주민등록번호</span><input type="text" class="input-text" name="cmpnum" required pattern="[0-9]+-[0-9]+" placeholder="990101-1234567"></div>
			<div class="form-input"><span class="data-name">사업자등록번호</span><input type="text" class="input-text" name="clblic" placeholder="123-12-12345"></div>
			<div class="form-input"><span class="data-name">전화번호</span><input type="text" class="input-text" name="cltel" required pattern="0[0-9]{1,2}-[0-9]{3,4}-[0-9]{4}" placeholder="010-1234-1234"></div>
			<div class="form-input"><span class="data-name">주소</span><input type="text" class="input-text" name="cladrs" required></div>
			<datalist id="clsize">
			</datalist>
			<button type="submit" class="submit-button">등록</button>
		</form>
	</div>
	<div class="content" id="update">
		<h2>기존고객</h2>
		<form method="get">
			<div class="form-input"><span class="data-name">이용자코드</span><input type="text" class="input-text" name="clcode" <?php if (isset($_GET['clcode']) && $this->member_data != null): ?> value="<?php echo $this->member_data->clcode ?>" disabled <?php endif; ?>><button type="submit" class="other-btn">검색</button></div>
		</form>
		<form method="post">
			<input type="hidden" name="action" value="old_member_update">
			<div class="form-input"><span class="data-name">이용자명</span><input type="text" class="input-text" name="clhnme" <?php if (isset($_GET['clcode']) && $this->member_data != null): ?> value="<?php echo $this->member_data->clhnme ?>" <?php endif; ?>></div>
			<div class="form-input"><span class="data-name">주민등록번호</span><input type="text" class="input-text" name="cmpnum" pattern="[0-9]+-[0-9]+" placeholder="990101-1234567" <?php if (isset($_GET['clcode']) && $this->member_data != null): ?> value="<?php echo $this->member_data->cmpnum ?>" <?php endif; ?>></div>
			<div class="form-input"><span class="data-name">사업자등록번호</span><input type="text" class="input-text" name="clblic" <?php if (isset($_GET['clcode']) && $this->member_data != null): ?> value="<?php echo $this->member_data->clblic ?>" <?php endif; ?> placeholder="123-12-12345"></div>
			<div class="form-input"><span class="data-name">전화번호</span><input type="text" class="input-text" name="cltel" pattern="0[0-9]{1,2}-[0-9]{3,4}-[0-9]{4}" placeholder="010-1234-1234" <?php if (isset($_GET['clcode']) && $this->member_data != null): ?> value="<?php echo $this->member_data->cltel ?>" <?php endif; ?>></div>
			<div class="form-input"><span class="data-name">주소</span><input type="text" class="input-text" name="cladrs" <?php if (isset($_GET['clcode']) && $this->member_data != null): ?> value="<?php echo $this->member_data->cladrs ?>" <?php endif; ?>></div>
			<datalist id="clsize">
			</datalist>
			<?php if (isset($_GET['clcode']) && $this->member_data != null): ?>
			<button type="submit" class="submit-button">수정</button>
			<button type="button" class="submit-button" onclick="location.replace('<?php echo HOME ?>/member/member_delete?code=<?php echo $this->member_data->clcode ?>')">삭제</button>
			<?php endif; ?>
		</form>				
	</div>
</div>