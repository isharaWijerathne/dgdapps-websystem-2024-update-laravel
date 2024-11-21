const prdBody = new Quill('#editor', {
    theme: 'snow'
  });

  const hiddenFild = document.getElementById("body")

  document.addEventListener('keydown', (event) => {
    if(hiddenFild != null){
      hiddenFild.value = prdBody.getSemanticHTML()
      console.log(prdBody.getSemanticHTML());
    }
    
  });


  

  