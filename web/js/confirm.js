yii.confirm = function (message, ok, cancel) {

    bootbox.confirm(
        {
            message: 'Da li ste sigurni da zelite obrisati stavku?',
            buttons: {
                confirm: {
                    label: "Obrisi"
                },
                cancel: {
                    label: "Otkazi"
                }
            },
            callback: function (confirmed) {
                if (confirmed) {
                    !ok || ok();
                } else {
                    !cancel || cancel();
                }
            }
        }
    );
    // confirm will always return false on the first call
    // to cancel click handler
    return false;
}