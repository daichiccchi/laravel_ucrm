// 改行コードをbrタグに変換する
const nl2br = (str) => {
    str = str.replace(/\r\n/g, "<br />");
    str = str.replace(/(\n|\r)/g, "<br />");
    return str;
}

// 今日の日付を取得する関数
const getToday = () => {
    const today = new Date();
    const year = today.getFullYear();
    const month = today.getMonth() + 1;
    const day = today.getDate();
    return year + "-" + month + "-" + day;
}

// export してあげることで初めて外部ファイルで使うことができる
export { nl2br, getToday }