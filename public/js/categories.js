/**
 * Created by adi on 4/10/17.
 */
$(document).ready(function () {
    $('#btn').click(function(event){
        event.preventDefault(); // this prevents the form from submitting
        $.ajax({
            url: url,
            type: "POST",
            data: {'name':$('#name').val(), _token: token},
            dataType: 'JSON',
            success: function (data) {
                $(document).ajaxStop(function () {
                    location.reload();
                });
                console.log(data); // this is good
            },
            error: function (x) {
                alert(x.responseText +x.status);
            }
        });
    });
});
var editSection = document.getElementsByClassName("edit");
for(var i = 0; i < editSection.length; i++)
{
    editSection[i].firstElementChild.firstElementChild.children[1].firstChild.addEventListener("click", start_editing);
    editSection[i].firstElementChild.firstElementChild.children[2].firstChild.addEventListener("click", start_delete);
}
function start_editing(event)
{
event.preventDefault();
event.target.innerHTML = "save";
var li = event.path[2].children[0];
li.children[0].value = event.path[4].previousElementSibling.children[0].innerHTML;
li.style.display = "inline-block";
setTimeout(function () {
    li.children[0].style.maxWidth = "110px";
},1);
event.target.removeEventListener("click", start_editing);
event.target.addEventListener("click", save_editing);
}

function save_editing(event)
{
event.preventDefault();
    var li = event.path[2].children[0];
    var categoryName = li.children[0].value;
    var catId = event.path[4].previousElementSibling.dataset["id"];
    if(categoryName.length === 0)
    {
        alert("Please enter a category name");
        return;
    }
    $.ajax({
        url : catEditUrl,
        type : "POST",
        data: {'name':categoryName,'cat_id' : catId, _token : token},
        dataType : 'JSON',

        success: function (data) {
            $(document).ajaxStop(function () {
                location.reload();
            });
            console.log(data); // this is good
        },
        error: function (x) {
            alert(x.responseText +x.status);
        }
    });
}

function start_delete(event)
{
event.preventDefault();
    event.target.removeEventListener('click', start_delete);
    var cat_id = event.path[4].previousElementSibling.dataset["id"];

    $.ajax({
        url : adminUrl+'/'+cat_id+'/delete',
        type : "GET",
        //data: {'cat_id' : cat_id},
        dataType : 'JSON',

        success: function (data) {
            $(document).ajaxStop(function () {
                location.reload();
            });
            console.log(data); // this is good
        },
        error: function (x) {
            console.log(x.responseText +x.status);
        }
    });
}
