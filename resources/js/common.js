// 改行コードをbrタグに変換する
const nl2br = (str) => {
    str = str.replace(/\r\n/g, "<br />");
    str = str.replace(/(\n|\r)/g, "<br />");
    return str;
}
// export してあげることで初めて外部ファイルで使うことができる
export {nl2br}