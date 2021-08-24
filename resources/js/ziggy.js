const Ziggy = {"url":"http:\/\/localhost:8000","port":8000,"defaults":{},"routes":{"auth":{"uri":"\/","methods":["GET","HEAD"]},"auth.login":{"uri":"auth","methods":["POST"]},"auth.logout":{"uri":"logout","methods":["GET","HEAD"]},"dash":{"uri":"dash","methods":["GET","HEAD"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
