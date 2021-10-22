import React from "react";
import ReactDOM from "react-dom";
import { ChakraProvider } from "@chakra-ui/react";
import theme from './../extendTheme'
import Sidebar from "./Sidebar";
import Navbar from "./Navbar";

function App() {
    return (
        <ChakraProvider theme={theme}>
            <Navbar />
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">App Component</div>

                            <div className="card-body">
                                Laravel Application
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ChakraProvider>
    );
}

export default App;

if (document.getElementById("myapp")) {
    ReactDOM.render(<App />, document.getElementById("myapp"));
}
