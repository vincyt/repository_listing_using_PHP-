
<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

</style>
<script src="js/jquery-3.2.1.min.js"></script>

</head>
<body>

<h2 align='center'>Repository Listing</h2>
<p>Please select the one option :</p>

<input type="radio" name="repo_selection" id="idc" value="repo_id" onclick="myFunction(this.checked,'repo_id')"> Repository Id (id : 458058)<br>
<input type="radio" name="repo_selection" id="url" value="url" onclick="myFunction(this.checked,'repo_url')"> Repository URL (url : 'https://github.com/symfony')<br>
<input type="radio" name="repo_selection" id="name" value="name" onclick="myFunction(this.checked,'repo_name')"> Repository Name (repo name : 'symfony')<br>
<div style="text-align: center;">
<img src="images/loading_apple.gif" style="width: 88px;display:none" id="loading_icon">
</div >
<br>
<div style="overflow-x:auto;">
  <table id="table_content">
  </table>
</div>

</body>
</html>


<script>
function myFunction(status,name) {
     if(status) {
	 var param_data ='';
		if(name=='repo_id')
		{
			param_data = {'repo_id':458058};
		}
		else if(name=='repo_url')
		{
			param_data = {'repo_url':'https://github.com/symfony'};
		}
		else
		{
			param_data = {'repo_name':'symfony'};
    }
    $('#table_content').empty();
    $("#loading_icon").css("display", "initial");
        $.ajax({
        type: "POST",
        url: "file_handler.php",
        data : param_data,
        success: function(response) {
          var parsed_data = $.parseJSON(response);
           var questions="";
           questions+="<tr><th>Name</th><th>Description</th><th>URL</th><th>Language</th><th>Size</th></tr>";
           $.each(parsed_data['repositories'], function(i, v){
            questions+="<tr>";
            questions+="<td>"+v.name+"</td>";
            questions+="<td>"+v.description+"</td>";
            questions+="<td>"+v.url+"</td>";
            questions+="<td>"+v.language+"</td>";
            questions+="<td>"+v.size+"</td>";
            questions+="</tr>";
          })
          $("#loading_icon").css("display", "none");
          $('#table_content').empty();
          $('#table_content').html(questions);
        },
        error:function(data){
          $("#loading_icon").css("display", "none");
            console.log("data")
        }
		});
     } 
}

function responsetrim(data){
  var i = data.indexOf("<!");

  if(i > 0)
    return data.slice(0, i);
  else
    return "";
}
</script>