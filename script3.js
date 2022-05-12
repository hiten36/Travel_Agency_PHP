if ( window.history.replaceState ) {
    window.history.replaceState( null, null, "index" );
}
const cnavas=document.getElementById('canvas');
const ctx=canvas.getContext('2d');
const image=new Image();
image.src='ticket/format.png';
image.onload=function()
{
    drawImage('');
}
n2=0;
function printAt( context , text, x, y, lineHeight, fitWidth)
{
    fitWidth = fitWidth || 0;
    
    if (fitWidth <= 0)
    {
         context.fillText( text, x, y );
        return;
    }
    
    for (var idx = 1; idx <= text.length; idx++)
    {
        var str = text.substr(0, idx);
        console.log(str, context.measureText(str).width, fitWidth);
        if (context.measureText(str).width > fitWidth)
        {
            context.fillText( text.substr(0, idx-1), x, y );
            printAt(context, text.substr(idx-1), x, y + lineHeight, lineHeight,  fitWidth);
            return;
        }
    }
    context.fillText( text, x, y );
}
function drawImage(val)
{
    ctx.drawImage(image,0,0,canvas.width,canvas.height);
    ctx.font='18px Arial';
    let c1=document.querySelector('.cm11');
    for(i of c1.children)
    {
        ctx.fillText(i.children[1].innerText,30,150+(30*n2));
        n2++;
    }
    ctx.font='30px Arial';
    let price=document.querySelector('.cm21').children[0].innerText;
    ctx.fillText(`${price}`,580,160);
    ctx.font='22px Arial';
    ctx.fillText('Seats',580,190)
    ctx.font='18px Arial';
    let str3="";
    let seats=document.querySelector('.cm23');
    
    for(i of seats.children)
    {
        str3+=`${i.innerText} `;
    }

    printAt(ctx,str3,540,210,20,260);
    ctx.font='22px Arial';
    let bus_name=document.querySelector('.cm24').children[0].innerText;
    ctx.fillText(bus_name,580,280);
    ctx.font='20px Arial';
    let bus_time=document.querySelector('.cm25').children;
    let str2="";
    for(i of bus_time)
    {
        str2+=`${i.innerText} `;
    }
    ctx.fillText(str2,580,320);
    ctx.font='18px Arial';
    str4="";
    str5="";
    for(i of document.getElementsByClassName('cm241')[0].children)
    {
        str4+=`${i.innerText}`;
    }
    ctx.fillText(str4,580,350);
    ctx.font='18px Arial';
    for(i of document.getElementsByClassName('cm241')[1].children)
    {
        str5+=`${i.innerText}`;
    }
    ctx.fillText(str5,580,380);
    ctx.font='18px Arial';
    let ids=document.querySelector('.cm22').children[0].value;
    ctx.fillText(`Tracking ID: ${ids}`,340,380);
}
document.getElementById('down-btn').onclick=async()=>{
    let blob = await new Promise(resolve=>canvas.toBlob(resolve));
    let url = URL.createObjectURL(blob);
    window.open(url);
    let a = document.createElement('a');
    a.href = url;
    a.download = '';
    a.click();
};
document.getElementById('l1').addEventListener('click',()=>{
    if(document.getElementById('dark').classList.contains('active')){
        document.getElementById('dark').classList.remove('active');
        document.getElementById('dark').style.display='none';
        document.getElementById('light').classList.add('active');
        document.getElementById('light').style.display='block';
        document.querySelector('.navbar').classList.add('dcolor1');
        document.querySelector('.mid-i').classList.add('dcolor2');
        document.querySelector('.mid-img').classList.add('dcolor3');
        document.querySelector('.logo-a').classList.add('dcolor4');
        document.querySelector('.book-main').classList.add('dcolor2');
        document.querySelector('.confo-main').classList.add('dcolor2');
        document.querySelector('.confo-main1').classList.add('dcolor1');
        for(i of document.querySelectorAll('.home-btn'))
        {
            i.classList.add('dcolor5');
        }
        for(i of document.querySelectorAll('.home21-i'))
        {
            i.classList.add('dcolor2');
        }
        for(i of document.querySelectorAll('.foot-a'))
        {
            i.classList.add('dcolor6');
        }
        for(i of document.querySelectorAll('.mnav'))
        {
            i.classList.add('dcolor1');
        }
        for(i of document.querySelectorAll('.mnav11-i'))
        {
            i.classList.add('dcolor2');
        }
        for(i of document.querySelectorAll('.mnav1-a'))
        {
            i.classList.add('dcolor6');
        }
        for(i of document.querySelectorAll('.results'))
        {
            i.classList.add('dcolor2');
        }
        for(i of document.querySelectorAll('.cm2'))
        {
            i.classList.add('dcolor7');
        }
        document.querySelector('.footer').classList.add('dcolor1');
        document.querySelector('.footer').classList.add('dcolor6');
        document.querySelector('.hiten').classList.add('dcolor4');
        document.querySelector('.home2').classList.add('dcolor1');
        document.querySelector('.logo-img').classList.add('dcolor3');
    }
    else
    {
        document.getElementById('dark').classList.add('active');
        document.getElementById('dark').style.display='block';
        document.getElementById('light').classList.remove('active');
        document.getElementById('light').style.display='none';
        document.querySelector('.navbar').classList.remove('dcolor1');
        document.querySelector('.mid-i').classList.remove('dcolor2');
        document.querySelector('.mid-img').classList.remove('dcolor3');
        document.querySelector('.logo-a').classList.remove('dcolor4');
        document.querySelector('.book-main').classList.remove('dcolor2');
        document.querySelector('.confo-main').classList.remove('dcolor2');
        document.querySelector('.confo-main1').classList.remove('dcolor1');
        for(i of document.querySelectorAll('.home-btn'))
        {
            i.classList.remove('dcolor5');
        }
        for(i of document.querySelectorAll('.home21-i'))
        {
            i.classList.remove('dcolor2');
        }
        for(i of document.querySelectorAll('.foot-a'))
        {
            i.classList.remove('dcolor6');
        }
        for(i of document.querySelectorAll('.mnav'))
        {
            i.classList.remove('dcolor1');
        }
        for(i of document.querySelectorAll('.mnav11-i'))
        {
            i.classList.remove('dcolor2');
        }
        for(i of document.querySelectorAll('.mnav1-a'))
        {
            i.classList.remove('dcolor6');
        }
        for(i of document.querySelectorAll('.results'))
        {
            i.classList.remove('dcolor2');
        }
        for(i of document.querySelectorAll('.cm2'))
        {
            i.classList.remove('dcolor7');
        }
        document.querySelector('.footer').classList.remove('dcolor1');
        document.querySelector('.footer').classList.remove('dcolor6');
        document.querySelector('.hiten').classList.remove('dcolor4');
        document.querySelector('.home2').classList.remove('dcolor1');
        document.querySelector('.logo-img').classList.remove('dcolor3');
    }
})