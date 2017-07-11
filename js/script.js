function showNav(){
    document.getElementById("mySideNav").style.width="250px";
    document.getElementById("content").style.marginLeft="250px";
    document.getElementById("content").style.width="100%";
    document.getElementById("content").style.border="1px solid blue";
}

function closeNav(){
    document.getElementById("mySideNav").style.width="0px";
    document.getElementById("content").style.marginLeft="0px";
    document.getElementById("content").style.width="auto";
}

function loadSideBar(){
    var studentOptions = ["Modules", "Timetable", "Upload Assignment", "Results", "Amend Personal Data"];
    var lecturerOptions = ["Modules", "Change Timetable", "Upload Results", "Upload Assignment", "Amend Personal Data"];
}

function openNav(){
    if(document.getElementById("mySideNav").style.width=="250px"){
        closeNav();
    }else{
        showNav();
    }
}

function myFunction(){
    if(screen.width > 800){
        showNav();
        document.getElementById("box-one").style.width= "75%";
        document.getElementById("box-one").style.float= "left";
    }else{
        closeNav();
        document.getElementById("box-one").style.width= "98%";
    }
}

function matchWidth(){
    console.log("Hello world");
    document.getElementById("dropDown").clientWidth = 250;
        // document.getElementById("userNamePlaceHolder").clientWidth;
}