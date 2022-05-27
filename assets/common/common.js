'use strict';

function charRemaining(target, value, max){

  let input = parseInt(value.length);
  let remain = max - input;

  let result =  `${remain} characters remaining`;
  let tag = $(`#${target}`);

  tag.css({
    fontWeight: 'bold', 
    fontSize: '14px', 
    display: 'block', 
    textAlign: 'end',
  });

  if(remain <= 20){
    tag.css('color', 'red');
  }else if(remain <= 50){
      tag.css('color', 'green');
  }else{
    tag.css('color', 'black');
  }

  tag.text(result);
}
