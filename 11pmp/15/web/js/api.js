var API_URL= "http://08b.gj.com/14/api/";
var TOKEN = 'abcd';
document.write('<script type="text/javascript" src="js/ksort.js"></script>');
document.write('<script type="text/javascript" src="js/md5.js"></script>');

/**
 * 签名生成
 * @param params 参数
 * return params+sign
 */
function setSign(params) {
    //发送的参数
    var _params = {};
    //加密的参数
    var _keyparams = {};
    //签名字符串
    var sign = '';

    //无参数情况
    if(params.length==0){
        sign = $.md5(TOKEN);
        _params.sign = sign;
        return _params;
    }

    //有参数情况 去空值
    $.each(params,function (i,v) {
        _params[i] = v;
        if(v!==''){
            _keyparams[i] = v;
        }
    });
    //字典性排序
    _keyparams = ksort(_keyparams);

    //转换成a=b&c=d
    var s = [];
    $.each(_keyparams,function (i, v) {
        var d = i+"="+v;
        s.push(d);
    });
    var v = s.join('&');
    sign = $.md5(v+TOKEN);
    _params.sign = sign;

    return _params;
}

/**
 * ajax发送数据请求
 * @param url
 * @param type
 * @param params
 * @param callback
 */
function sendAjax(url,type,params,callback) {
    var p = setSign(params);
    $.ajax({
        url:API_URL+url,
        type:type,
        data:p,
        dataType:'json',
        success:function (e) {
            callback(e);
        }
    })
}