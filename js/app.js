
   $("#addbtn").click(function()
    {
        var input = $('#taska').val();
        $.post("addnewtask.php",
                      {
                        task : input,
                      },function(data,status){
                      document.getElementById("ul").innerHTML="";
                      getAlldata();
        });
    });
    
    $("#emptylist").click(function(){
        $.get("remove.php");
        document.getElementById("ul").innerHTML="";
    });

    function addlist(Id,Task_Name,status) 
    {
        divtag = `<div class="done text-center"`;
        if(status==1){
            divtag = divtag+`style="text-decoration-line: line-through;"`;
        }
        divtag=divtag+`>`;

        tag = $("<li></li").addClass("text-center").html(divtag+Task_Name+`</div>`);
        tag2= $("<div></div>").addClass("text-center").html(`<input style="display:none;" id="taskid" value="`+Id+`"><button class="delbut btn btn-outline-primary" onclick="deltask(this);">
                        <i class="fa fa-trash-o"> </i>
                      </button>
                      <button class=" combut btn btn-outline-primary" onclick="comtask(this);">
                        <i class="fa fa-check"> </i>
                      </button>
                      <button class="btn btn-outline-primary " onclick="redotask(this);">
                        <i class="fa fa-repeat"></i>
                      </button>`);
        $("ul").append(tag);
        $("ul").append(tag2);
    }
    
    
    
    function getAlldata()
    {
        arr = null;
        $.ajax({
            url: "/database.php",
            type: "get",
            success: function (response) {
                if(response.trim()!=="failed"){
                    arr = JSON.parse(response);
                    for(var entry in arr)
                    {
                        addlist(arr[entry]['Id'],arr[entry]['Task_Name'],arr[entry]['status']);
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus);
            }
        });
	
    }
     
    function deltask(button)
    {
        id = $(button).parent().find("#taskid").val();
        $.ajax({
            url: "/delete_mark.php",
            type: "PUT",
            data: {
            "taskdel" : id
            },
            success: function (response) {
                if(response.trim()!=="failed"){
                    document.getElementById("ul").innerHTML="";
                      getAlldata();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus);
            }
        });
    }
    
    function redotask(button)
    {
        id = $(button).parent().find("#taskid").val();
        $.ajax({
            url: "delete_mark.php",
            type: "delete",
            data: {
            "taskdel" : id
            },
            success: function (response) {
                if(response.trim()!=="failed"){
                     document.getElementById("ul").innerHTML="";
                      getAlldata();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus);
            }
        });
    }
    
    function comtask(button)
    {
        id = $(button).parent().find("#taskid").val();
        $.ajax({
            url: "delete_mark.php",
            type: "get",
            data: {
            "taskdel" : id
            },
            success: function (response) {
                if(response.trim()!=="failed"){
                     document.getElementById("ul").innerHTML="";
                      getAlldata();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus);
            }
        });
    }
$(document).ready(function(){
 document.getElementById("ul").innerHTML="";
 getAlldata();  
});