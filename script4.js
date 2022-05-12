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
const abcd=async()=>{
    let blob = await new Promise(resolve=>canvas.toBlob(resolve));
    let url = URL.createObjectURL(blob);
    window.open(url);
    let a = document.createElement('a');
    a.href = url;
    a.download = '';
    a.click();
};
setTimeout(() => {
    abcd();
    window.location.href="index";
}, 400);