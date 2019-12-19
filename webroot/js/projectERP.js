function select(obj) {
    document.getElementById("sel_result").innerHTML = obj.innerHTML+"<span class=\"caret\" style=\"margin-left: 5px;\"></span>";
}
$( function() {
    $( ".datepicker" ).datepicker({dateFormat: "yy-mm-dd"});
} );

function getHejiPrice(){
	var totalPrice = document.getElementById("totalPrice").value;
	var youhuiPrice = document.getElementById("youhui_price").value;
	if(!isNaN(totalPrice)&&!isNaN(youhuiPrice)){
		document.getElementById("heji_price").value = (totalPrice - youhuiPrice).toFixed(2);
	}
}


window.onload = function () {
    function get_itemInfo() {
        document.getElementById("item_info").style.display = "inline";
        document.getElementById("submit-q").style.display = "inline";

    }
	function add_wuliao_line() {

        var new_tr = document.createElement("tr");

        var new_th1 = document.createElement("th");
        var new_input1 = document.createElement("input");
        new_input1.style = "border:none;";
        new_input1.placeholder = "请输入...";
        new_th1.appendChild(new_input1);

        var new_th2 = document.createElement("th");
        var new_input2 = document.createElement("input");
        new_input2.style = "border:none;";
        new_input2.placeholder = "请输入...";
        new_th2.appendChild(new_input2);

        var new_th3 = document.createElement("th");
        var new_input3 = document.createElement("input");
        new_input3.style = "border:none;";
        new_input3.placeholder = "请输入...";
        new_th3.appendChild(new_input3);

        var new_th4 = document.createElement("th");

        new_tr.appendChild(new_th1);
        new_tr.appendChild(new_th2);
        new_tr.appendChild(new_th3);
        new_tr.appendChild(new_th4);
        document.getElementById("add_wuliao").appendChild(new_tr);
    }
    //document.getElementById("add_wuliao_line").onclick = add_wuliao_line;
    //document.getElementById("search-id").onclick = get_itemInfo;
}
function add_caigou(id,name){
	var new_tr = document.createElement("tr");

    var new_th1 = document.createElement("th");
    new_th1.innerHTML = id;

    var new_th2 = document.createElement("th");
    new_th2.innerHTML = name;

    var new_th3 = document.createElement("th");
    var new_input3 = document.createElement("input");
    new_input3.style = "border:none;";
    new_input3.placeholder = "请输入...";
    new_th3.appendChild(new_input3);

    var new_th4 = document.createElement("th");
    var new_input4 = document.createElement("input");
    new_input4.style = "border:none;";
    new_input4.placeholder = "请输入...";
    new_th4.appendChild(new_input4);

    new_tr.appendChild(new_th1);
    new_tr.appendChild(new_th2);
    new_tr.appendChild(new_th3);
    new_tr.appendChild(new_th4);
    document.getElementById("add_caigou").appendChild(new_tr);
}
function change_caigou(obj){
	if (confirm("确认添加吗？")){
        var id = obj.getAttribute("data-id");
        var name = obj.getAttribute("data-name");
        document.getElementById("add_caigou_header").style.display = "inline";
        document.getElementById("add_caigou_body").style.display = "inline";
        add_caigou(id,name);
    }
}
function select(obj) {
    document.getElementById("sel_result").innerHTML = obj.innerHTML+"<span class=\"caret\" style=\"margin-left: 5px;\"></span>";
}
function get_itemInfo() {
    document.getElementById("item_info").style.display = "inline";
    document.getElementById("submit-q").style.display = "inline";
}
function getTotalPrice(){
	var quantity = document.getElementById("quantity").value;
	var price = document.getElementById("price").value;
	if(!isNaN(quantity)&&!isNaN(price)){
		document.getElementById("totalPrice").value = quantity*price;
	}
}
function modifyPwd(){
	document.getElementById("modifypwd").value = "";
}
function getLailiaoTotalPrice(){
	var real_quantity = document.getElementById("real_quantity").value;
	var zengsong_quantity = document.getElementById("zengsong_quantity").value;
	var real_price = document.getElementById("real_price").value;
	if(!isNaN(zengsong_quantity)&&!isNaN(real_price)){
		document.getElementById("real_totalprice").value = (real_quantity-zengsong_quantity)*real_price;
	}
}
// 点击事件change
/*
$("input[type=radio][name=yuunshufangshi]").change(function() {
	//$('#wuliucompany').val("default");//设置value为default的option选项为默认选中
	//$('#tihuoren').val("");
	//$('#songhuoren').val("");
	
    // 获取input radio选中值，方法二
    var myvalue = $(this).val();
	alert(myvalue);
});
*/
