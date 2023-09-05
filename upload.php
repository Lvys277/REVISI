
<div class="createpost" >
  <div style="margin-left:65px;margin-bottom:5px;" class="post-icon">
    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background: #ffebed;padding-left:30px;padding-top:10px;padding-bottom:10px;padding-right:30px;text-decoration:none;margin-top:15px;margin-bottom:-5px;">
    <i style="background: #ff4154;" class="fa-solid fa-pen"></i>
    Apa yang kamu pikirkan?</a>
    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" style="background: #d7ffef;padding-left:30px;padding-top:10px;padding-bottom:10px;padding-right:30px;text-decoration:none;margin-top:15px;margin-bottom:-5px;">
    <i style="background: #ffca28;" class="fa-solid fa-image"></i>
    Upload gambar</a>
</div>
</div>
<script>
const textarea = document.querySelector("textarea");
textarea.addEventListener("keyup", e =>{
textarea.style.height = "63px";
let scHeight = e.target.scrollHeight;
textarea.style.height = `${scHeight}px`;});
</script>
    