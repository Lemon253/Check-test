document.addEventListener("DOMContentLoaded", () => {
    let buttons = document.querySelectorAll(".update-form__button-submit");
    let modal = document.getElementById("modal");
    let closeBtn = document.getElementById("close-modal");

    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            // ボタンがある行の最初の <td> を取得
            let row = button.closest("tr").querySelector("td");
            let data = row.dataset;

            // モーダルにデータをセット
        
            document.getElementById("modal-last-name").textContent = data.lastName;
            document.getElementById("modal-first-name").textContent = data.firstName;
            document.getElementById("modal-gender").textContent =
                data.gender == 1 ? "男性" : (data.gender == 2 ? "女性" : "その他");
            document.getElementById("modal-email").textContent = data.email;
            document.getElementById("modal-tel").textContent = data.tel;
            document.getElementById("modal-address").textContent = data.address;
            document.getElementById("modal-building").textContent = data.building;
            document.getElementById("modal-category").textContent = data.category;
            document.getElementById("modal-detail").textContent = data.detail;

            // モーダル表示
            modal.style.display = "block";

            // 削除フォームのactionを設定
            document.getElementById("delete-form").action = "admin/delete/" + data.id;
        });
    });

    // モーダルを閉じる
    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });
});
