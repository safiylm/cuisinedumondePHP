<style>
#field{
  margin: 0 auto;
  padding: 15px;
  border-radius: 10px;
  width:50%;
  height:25px;
  border:none;
  background-color: #f2f2f2;
}
</style>

   <form>
   <p style="margin:40px;">  Rechercher  :
      <input type="text" id="field" onkeyup="show(this.value)"></p>
   </form>
   <br><br>
  <span id="proposals"></span>
   
   <script src="call.js">
   </script>
   
