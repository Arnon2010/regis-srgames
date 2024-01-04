
function aaa(){


swal({
    title: "คุณต้องการลบข้อมูลใช่หรือไม่?",
    text: "ถ้าลบข้อมูล user จะไม่สามารถเข้าสู่ระบบได้",
    icon: "warning",
    buttons: {
            cancel: {
                text: "ยกเลิก!",
                value: null,
                visible: true,
                className: "",
                closeModal: false,
            },
            confirm: {
                text: "ใช่, ฉันต้องการลบ!",
                value: true,
                visible: true,
                className: "",
                closeModal: false
            }
    }
})
.then((isConfirm) => {
    if (isConfirm) {
        swal("Deleted!", "คุณได้ลบข้อมูลเรียบร้อยแล้ว.", "success");

    } else {
        swal("ยกเลิก", "คุณได้ยกเลิกการลบเรียบร้อยแล้ว", "error");
    }
});
}
aaa();
