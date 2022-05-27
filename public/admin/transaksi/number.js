$(".harga").on("keyup", function(){
    var valid = /^d{0,15}(.d{0,2})?$/.test(this.value),
        val = this.value;
    
    if(!valid){
        console.log("Invalid input!");
        this.value = val.substring(0, val.length - 1);
    }
});