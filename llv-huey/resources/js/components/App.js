import React from "react";
import ReactDOM from "react-dom";
import { ChakraProvider, ColorModeScript } from "@chakra-ui/react";
import theme from './../extendTheme'
import Sidebar from "./Sidebar";
import Navbar from "./Navbar";

function App() {
    return (
        <ChakraProvider theme={theme}>
            <ColorModeScript initialColorMode={theme.config.initialColorMode} />
            <Navbar />            
        </ChakraProvider>
    );
}

export default App;

if (document.getElementById("myapp")) {
    ReactDOM.render(<App />, document.getElementById("myapp"));
}
