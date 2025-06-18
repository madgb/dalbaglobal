<div id="modal-password" class="modal modal_password">
  <div class="modal__inner">
    <div class="modal__close">
      <button type="button" class="btn_modal-close" onclick="closeModal('modal-password')">닫기</button>
    </div>
    <div class="modal__header">
      <h3>비밀번호 변경</h3>
    </div>
    <div class="modal__content">
      <form action="/master/member/member_edit_action.php" method="POST" class="form_password">
        <fieldset>
          <div class="input_password">
            <label for="current_password" class="label_input">현재 비밀번호</label>
            <div class="input_content">
              <input type="password" name="current_password" id="current_password" placeholder="현재 비밀번호를 입력해주세요." required>
            </div>
          </div>

          <div class="input_password">
            <label for="new_password" class="label_input">새로운 비밀번호</label>
            <div class="input_content">
              <input type="password" name="new_password" id="new_password" placeholder="새로운 비밀번호를 입력해주세요." required>
            </div>
          </div>

          <div class="input_password">
            <label for="confirm_password" class="label_input">비밀번호 확인</label>
            <div class="input_content">
              <input type="password" name="confirm_password" id="confirm_password" placeholder="비밀번호를 확인해주세요." required>
            </div>
          </div>

          <div class="modal__btns mt24 end">
            <button type="submit" class="btn btn-lg btn_primary btn_p24">비밀번호 변경</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>

