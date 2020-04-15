import "../../css/staff/app.css";

import * as React from "react";
import { InertiaApp } from "@inertiajs/inertia-react";
import { render } from "react-dom";

if (module.hot) {
    window.setTimeout(() => {
        if (module.hot && module.hot.data && module.hot.data.scrollPosition) {
            window.scrollTo(0, module.hot.data.scrollPosition);
        }
    }, 100);

    const firstVisit = window.location.pathname;

    module.hot.accept();

    module.hot.dispose((data) => {
        if (firstVisit !== window.location.pathname) {
            window.location.reload();
        } else {
            data.scrollPosition = window.pageYOffset;
        }
    });
}

const app = document.getElementById("app")!;

render(
    <InertiaApp
        initialPage={JSON.parse(app.dataset.page as string)}
        resolveComponent={async (name: string) => {
            const context = require.context("./app/", true, /views\/[^.]+\.tsx/, "lazy");

            return (await context(name.replace("staff/app/", "./") + ".tsx")).default;
        }}
    />,
    app
);
