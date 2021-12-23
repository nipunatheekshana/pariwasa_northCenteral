function message(status,msg,icon){
    var color='green'
    if(status=='success'){
        color='green'
    }
    else if (status=='danger') {
        color='red'
    }
    else if (status=='warning') {
        color='yellow'
    }

    iziToast.show({
        // title: 'OK',
        icon: icon,
        // iconColor:'black',
        color:color , // blue, red, green, yellow
        position: 'topRight',
        message: msg,
    });
}


