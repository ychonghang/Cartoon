
window.onload = function(){
    water('ul_main','box');
}


function water(main,box){

    // 获取class为main的元素
    var mainElemends = document.getElementsByClassName(main)[0];

    // 加载数据,并返回数据
    // var datas = loadData();
    loadData();

    // 添加数据到mian里
    // addToMain(mainElemends,datas);

    window.onscroll = function(){

        // 获取滚动条滚动多少像素  一为body  二为html
        var scrollPixel = document.body.scrollTop | document.documentElement.scrollTop;

        // 获取页面高度
        var pageHeight = document.documentElement.clientHeight;

        // 获取最后一个li元素
        var lastLi = mainElemends.lastChild;


        // 获取最后li的高度
        var llHeight = lastLi.offsetHeight;

        // 获取最后li的top的值
        var llTop = lastLi.offsetTop;

        // 计算main的高度 - li高度的一半
        var mainHeight = llTop + Math.floor(llHeight/2);

        if(mainHeight - scrollPixel +250 < pageHeight)
        {

            // 加载数据,并返回数据
            // var datas = loadData();
            loadData();

            // 添加数据到mian里
            // addToMain(mainElemends,datas);
        }


    }

}


// 排列图片
function startRank(maine)
{
    // 获取所有li元素
    var boxs = maine.getElementsByTagName('li');

    if(boxs.length <= 0)
    {
        return;
    }

    // 获取li宽度
    var liWidth = boxs[0].offsetWidth;

    // 获取main宽度
    var mainWidth = maine.offsetWidth;

    // 获取body的宽度
    var bodyWidth = document.body.clientWidth;

    // 如果界面宽度小于main标签时就拿body宽度使用
    if(bodyWidth<mainWidth)
    {
        mainWidth = bodyWidth;
    }


    // 获取一页多少个图片
    var imgNum = Math.floor(mainWidth/liWidth);

    // 存储每行li的高度
    var liHeights = [];

    // 开始排列
    for(var i in boxs)
    {

        if(boxs[i].className != 'box')
        {
            continue;
        }
        if(i < imgNum )
        {
            // 如果是前一行就设置
            boxs[i].style.top = '0px';
            // 个数*li宽度
            boxs[i].style.left = (i * liWidth)+'px';
            // 把所有第一行li的高度放入数组
            liHeights.push(boxs[i].offsetHeight);

        } else {
            // 获取最小值与其下标
            var liHeightArr = getMinValue(liHeights);

            // 设置li上的距离main的长度
            boxs[i].style.top = liHeightArr[0]+'px';

            // 设置li左的距离main的长度
            boxs[i].style.left = (liHeightArr[1] * liWidth)+'px';

            // 在从新把这li的高度添加到liHeights数组里,就在原先的基础上加上li的高度
            liHeights[liHeightArr[1]] += boxs[i].offsetHeight;

        }
    }

}


// 返回0=>最小值与其1=>下标
function getMinValue(heights)
{
    var minValue = Math.min.apply(null,heights);
    for(i in heights)
    {
        if(heights[i] == minValue)
        {
            var minIndex = i;
            break;
        }
    }

    return [minValue,minIndex];
}




// 添加数据到main
function addToMain(maine,datas)
{


    // var data = datas.img;


    var datas = datas.img;
    // 遍历数据，在添加li之类元素
    for(i in datas)
    {
        // 创建包含图片元素，返回
        var li = createLi(datas[i].src,datas[i].id);
        // 把li元素添加到main里
        maine.appendChild(li);

    }


    // 进行图片排列
    startRank(maine);

}


// 创建li和里面的内容
function createLi(imgName,$url)
{
    // 创建li元素
    var newLi = document.createElement('li');
    newLi.className = 'box';  //添加box样式

    // 创建a标签
    var newA = document.createElement('a');
    newA.className = 'bg';  //添加bg样式
    newA.href = '/home/book/'+$url;

    // 把a标签添加到newLi里
    newLi.appendChild(newA);

    // 创建图片
    var newImg = document.createElement('img');
    newImg.src = '' + imgName;
    newImg.style.width = "104px";

    // 把图片添加到newA
    newA.appendChild(newImg);

    // 返回图片newLi元素
    return newLi;

}


// 加载数据  0=>图片数据，1=>更新时间数据
function loadData()
{
    var existsNum = $(".ul_main").children("li").length;
    $.ajax({
        "type":"get",
        "url":"/home/showpage/getData",
        "data":({
            "num":existsNum,
        }),
        "success":function (data) {
            var mainElemends = document.getElementsByClassName('ul_main')[0];
            var datas = eval(data);
            addToMain(mainElemends,datas);
        },
        "error":function () {
            alert("错误");
        },
        "dataType":"json",
        "async":"false",
    });
}