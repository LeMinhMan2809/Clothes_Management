var accountBox = document.querySelector('.header .account-box');
// console.log(searchForm)
var userbtn = document.querySelector('#user-btn');
// console.log(btn)
userbtn.onclick = () =>{
    accountBox.classList.toggle('active');
}



// console.log(document.querySelector('.box-container'))
function show(){
    const formdata = new FormData();
    const ajax = new XMLHttpRequest()
    ajax.open('POST','./show.php')
    ajax.send()
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200){
            var data = JSON.parse(this.responseText)
            var html = ""
            for(var i=0; i<data.length; i++){
                pid = data[i].p_id
                pname = data[i].p_name
                pprice = data[i].p_price
                pimage = "product_uploaded/"+data[i].p_image
                html += '<div class="box_product">'
                    html += "<img src="+pimage+">"
                    html += "<div>"+pname+"</div>"
                    html += '<div class="price">'+pprice+' <span> đ</span> </div>'
                html += "</div>"
            }
            document.querySelector('.box-container').innerHTML = html
        }
    }
}

function del(id){
    const formdata = new FormData();
    formdata.append('id',id)
    const ajax = new XMLHttpRequest()
    ajax.open('POST','./delete.php')
    ajax.send(formdata)
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200){
            show()
        }
    }
}