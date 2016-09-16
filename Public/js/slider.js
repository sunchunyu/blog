/**
 * Created by Administrator on 2015/12/14.
 */
var obj = null;
var As = document.getElementById('topnav').getElementsByTagName('a');
obj = As[0];
for (i = 1; i < As.length; i++) {
    //alert(window.location.href + '\r\n' + As[i].href + '\r\n' + window.location.href.indexOf(As[i].href));
    if (window.location.href.indexOf(As[i].href) >= 0) {
        obj = As[i];
        break;
    }
}
obj.id = 'topnav_current'