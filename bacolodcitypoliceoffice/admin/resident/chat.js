var CHBT_SERVER='http://www.chatbutton.com';var CHBT_DebugMode=0;var CHBT_capable=false;var CHBT_channel;var CHBT_title;var CHBT_titlecolor;var CHBT_size;var CHBT_bgcolor;var CHBT_bordercolor;var CHBT_textsize;var CHBT_textcolor;var CHBT_nncolor;var CHBT_usercolor;var CHBT_cpcolor;var CHBT_flashcolor;var CHBT_profanityfilter;var CHBT_loadmessages;var CHBT_QS;var CHBT_NN;var CHBT_BETA;var CHBT_SID;var CHBT_SESS=NewSession();try
{var CHBT_REFERRER=document.location.href;if(typeof(CHBT_channel)=="undefined"&&typeof(KOOL_channel)!="undefined")
{CHBT_channel=KOOL_channel;}
if(typeof(CHBT_title)=="undefined"&&typeof(KOOL_title)!="undefined")
{CHBT_title=KOOL_title;}
if(typeof(CHBT_titlecolor)=="undefined"&&typeof(KOOL_titlecolor)!="undefined")
{CHBT_titlecolor=KOOL_titlecolor;}
if(typeof(CHBT_size)=="undefined"&&typeof(KOOL_size)!="undefined")
{CHBT_size=KOOL_size;}
if(typeof(CHBT_bgcolor)=="undefined"&&typeof(KOOL_bgcolor)!="undefined")
{CHBT_bgcolor=KOOL_bgcolor;}
if(typeof(CHBT_bordercolor)=="undefined"&&typeof(KOOL_bordercolor)!="undefined")
{CHBT_bordercolor=KOOL_bordercolor;}
if(typeof(CHBT_textcolor)=="undefined"&&typeof(KOOL_textcolor)!="undefined")
{CHBT_textcolor=KOOL_textcolor;}
if(typeof(CHBT_textsize)=="undefined"&&typeof(KOOL_textsize)!="undefined")
{CHBT_textsize=KOOL_textsize;}
if(typeof(CHBT_usercolor)=="undefined"&&typeof(KOOL_usercolor)!="undefined")
{CHBT_usercolor=KOOL_usercolor;}
if(typeof(CHBT_nncolor)=="undefined"&&typeof(KOOL_nncolor)!="undefined")
{CHBT_nncolor=KOOL_nncolor;}
if(typeof(CHBT_cpcolor)=="undefined"&&typeof(KOOL_cpcolor)!="undefined")
{CHBT_cpcolor=KOOL_cpcolor;}
if(typeof(CHBT_flashcolor)=="undefined"&&typeof(KOOL_flashcolor)!="undefined")
{CHBT_flashcolor=KOOL_flashcolor;}
if(typeof(CHBT_profanityfilter)=="undefined"&&typeof(KOOL_profanityfilter)!="undefined")
{CHBT_profanityfilter=KOOL_profanityfilter;}}
catch(e)
{}
if(window.XMLHttpRequest)
{try
{CHBT_capable=new XMLHttpRequest();}
catch(e)
{CHBT_capable=false;}}
else if(window.ActiveXObject)
{var msxmlhttp=new Array('Msxml2.XMLHTTP.5.0','Msxml2.XMLHTTP.4.0','Msxml2.XMLHTTP.3.0','Msxml2.XMLHTTP','Microsoft.XMLHTTP');for(var i=0;i<msxmlhttp.length;i++)
{try
{CHBT_capable=new ActiveXObject(msxmlhttp[i]);}
catch(e)
{CHBT_capable=null;}}}
if(CHBT_capable)
{try
{CHBT_NN=CHBT_GetCookie('CHBT_NN');if(!CHBT_NN)
{CHBT_NN=CHBT_GetCookie('CHBT_NN');}
if(!CHBT_NN)
{CHBT_NN="";}}
catch(e)
{CHBT_NN="";}
try{CHBT_SID=CHBT_GetCookie('CHATBUTTON_SID');if(!CHBT_SID)
{CHBT_SID=NewSID();}}
catch(e)
{CHBT_SID="ERROR_SETTING_SID";}}
else
{CHBT_QS="capable=NO&bgcolor="+CHBT_bgcolor;}
if(!CHBT_size)
{CHBT_size="400x280";}
var CHBT_sizes=CHBT_size.split("x");var CHBT_sizeW=CHBT_sizes[0];var CHBT_sizeH=CHBT_sizes[1];if(!CHBT_BETA)
{CHBT_BETA="";}
document.write('<IFRAME name="CHATBUTTON_CHATBOX" marginwidth="0" marginheight="0" frameborder="0"'+'vspace="0" hspace="0" allowtransparency="true" scrolling="no" width="'+CHBT_sizeW+'" height="'+CHBT_sizeH+'" '+'src="'+CHBT_SERVER+'/'+CHBT_BETA+'iframe_preload.php?bgcolor='+escape(CHBT_bgcolor)+'"></IFRAME>');document.write('<form id="CHATBUTTON_LOAD_CHATBOX" name="CHATBUTTON_LOAD_CHATBOX" action ="'+CHBT_SERVER+'/'+CHBT_BETA+'chatbox/" target="CHATBUTTON_CHATBOX" method="post">'
+'<input type="hidden" name="channel" value="'+escape(CHBT_channel)+'">'
+'<input type="hidden" name="title" value="'+CHBT_title+'">'
+'<input type="hidden" name="titlecolor" value="'+escape(CHBT_titlecolor)+'">'
+'<input type="hidden" name="size" value="'+escape(CHBT_size)+'">'
+'<input type="hidden" name="bgcolor" value="'+escape(CHBT_bgcolor)+'">'
+'<input type="hidden" name="bordercolor" value="'+escape(CHBT_bordercolor)+'">'
+'<input type="hidden" name="textsize" value="'+escape(CHBT_textsize)+'">'
+'<input type="hidden" name="textcolor" value="'+escape(CHBT_textcolor)+'">'
+'<input type="hidden" name="nncolor" value="'+escape(CHBT_nncolor)+'">'
+'<input type="hidden" name="usercolor" value="'+escape(CHBT_usercolor)+'">'
+'<input type="hidden" name="cpcolor" value="'+escape(CHBT_cpcolor)+'">'
+'<input type="hidden" name="flashcolor" value="'+escape(CHBT_flashcolor)+'">'
+'<input type="hidden" name="profanityfilter" value="'+escape(CHBT_profanityfilter)+'">'
+'<input type="hidden" name="sid" value="'+escape(CHBT_SID)+'">'
+'<input type="hidden" name="session" value="'+escape(CHBT_SESS)+'">'
+'<input type="hidden" name="nn" value="'+escape(CHBT_NN)+'">'
+'<input type="hidden" name="loadmessages" value="'+escape(CHBT_loadmessages)+'">'
+'<input type="hidden" name="ref" value="'+CHBT_REFERRER+'">'
+'<input type="hidden" name="beta" value="'+escape(CHBT_BETA)+'"></form>');document.CHATBUTTON_LOAD_CHATBOX.submit();function CHBT_GetCookie(name){var arg=name+"=";var alen=arg.length;var clen=document.cookie.length;var i=0;while(i<clen)
{var j=i+alen;if(document.cookie.substring(i,j)==arg)
return getCookieVal(j);i=document.cookie.indexOf(" ",i)+1;if(i==0)break;}
return null;}
function getCookieVal(offset){var endstr=document.cookie.indexOf(";",offset);if(endstr==-1)
endstr=document.cookie.length;return unescape(document.cookie.substring(offset,endstr));}
function NewSID()
{var chars="0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";var rs='';for(var i=0;i<64;i++)
{var rnum=Math.floor(Math.random()*chars.length);rs+=chars.substring(rnum,rnum+1);}
document.cookie='CHATBUTTON_SID='+rs+'; expires=Sun, 17 Jan 2038 23:59:59; path=/;';return rs;}
function NewSession()
{var chars="0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";var rs='';for(var i=0;i<8;i++)
{var rnum=Math.floor(Math.random()*chars.length);rs+=chars.substring(rnum,rnum+1);}
return rs;}