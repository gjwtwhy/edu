var WEB_URL = "http://07b.gj.com/week3/web/";
var API_URL = "http://07b.gj.com/week3/api/stu.php";
document.write('<script type="text/javascript" src="'+WEB_URL+'js/ksort.js"></script>');
document.write('<script type="text/javascript" src="'+WEB_URL+'js/md5.js"></script>');
var _TOKEN = 'abcdefg';

/**
 * 设置签名
 */
function setSign(param){
    var param_ = []; //存储加密的数组
    var sendParam = {};//发送的参数
    $.each(param,function (i,value) {
        sendParam[i] = value;//参数处理
        if(value !== ''){ //过滤空数据
            param_[i] = value;
        }
    });
    //引入ksort.js文件，实现ksort排序，只支持数组，返回的是一个对象
    param_ = ksort(param_);//对数据做字典性排序
    var query = [];//=拼装
    $.each(param_,function (i, value) {
        query.push(i+'='+value);
    });
    query = query.join('&',query);//&拼装字符幢
    var sign = $.md5(query+_TOKEN);//拼装秘钥后md5加密
    //console.log(sendParam);
    sendParam.sign = sign;
    //console.log(sendParam);return false;
    return sendParam;
}

/**
 * ajax请求
 * @type type:get/post
 * @param url
 * @param data
 * @param callback
 */
function sendAjax(type, url, data, callback) {
    var param = setSign(data);
    $.ajax({
        type: type,
        url: url,
        data: param,
        dataType: 'json',
        success: function (e) {
            callback(e);
        }
    });
}
