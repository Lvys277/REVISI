/* Import Google font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

::selection{
  color: #fff;
  background: #4671EA;
}
.wrapper{
 
  background: #fff;
  border-radius: 5px;
  
  margin-top:10px;
  
}
.wrapper h2{
  color: #4671EA;
  font-size: 28px;
  text-align: center;
}
.wrapper textarea{
  width: 100%;
  resize: none;
  height: 159px;
  outline: none;
  padding: 15px;
  font-size: 16px;
 
  border-radius: 5px;
  max-height: 330px;
  caret-color: #4671EA;
  border: 1px solid #bfbfbf;
}
textarea::placeholder{
  color: #b3b3b3;
}
textarea:is(:focus, :valid){
  padding: 14px;
  border: 2px solid #4671EA;
}
textarea::-webkit-scrollbar{
  width: 0px;
}

<div class="wrapper">
                    <textarea spellcheck="false" name="deskripsi" placeholder="Type something here..." required></textarea>
                  </div>
