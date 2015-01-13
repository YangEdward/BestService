/**
 * Created by Edward on 2014/12/25.
 */

;function changeImage(){
    document.getElementById("pic").src = "images/boottle2.jpg"
}

function onLoad(name,job){
    try{
        sweetggAlert("Oops...","Something went wrong!", "error");
    }catch (err){
        var txt="There was an error on this page.\n\n";
        txt+="Error description: " + err.message + "\n\n";
        txt+="Click OK to continue.\n\n";
        sweetAlert(txt);
    }
    //alert("错误信息 " + name + " the job is " + job);
}

function onChangeMessage(){
    x = document.getElementById("demo");
    //x.innerHTML = "This text has been changed";
    var y = Number.MAX_VALUE;//(5);
    alert(y);
    var z = 6;
    var name = new String;
    var car = new Object();
    car.wheel = 4;
    car.windows = 2;
    car.weight = 850;
    car.color = "white"
    car.run = onLoad("Edward");
    name = "tujiao";
    var arr = new Array;
    var person={fname:"John",lname:"Doe",age:25};
    var txt = "";
    for (nae in person)
    {
        txt=txt + person[nae];
    }
    var w=window.innerWidth
        || document.documentElement.clientWidth
        || document.body.clientWidth; //1280

    var h=window.innerHeight
        || document.documentElement.clientHeight
        || document.body.clientHeight; //576
    x.innerHTML = h;
    $("#demo").attr("style","color:red").html("Hello jQuery");
}

function goBack()
{
    window.history.back()
}

function goForward()
{
    window.history.forward()
}

function setCookie(c_name,value,expiredays) {
    var exdate=new Date()
    exdate.setDate(exdate.getDate()+expiredays)
    document.cookie=c_name+ "=" +escape(value)+
    ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
}

function getCookie(c_name) {
    if (document.cookie.length>0)
    {
        c_start=document.cookie.indexOf(c_name + "=")
        if (c_start!=-1)
        {
            c_start=c_start + c_name.length+1
            c_end=document.cookie.indexOf(";",c_start)
            if (c_end==-1) c_end=document.cookie.length
            return unescape(document.cookie.substring(c_start,c_end))
        }
    }
    return ""
}

function checkCookie() {

    username=getCookie('username')
    if (username!=null && username!="")
    {alert('Welcome again '+username+'!')}
    else
    {
        username=prompt('Please enter your name:',"")
        if (username!=null && username!="")
        {
            setCookie('username',username,365)
        }
    }
}