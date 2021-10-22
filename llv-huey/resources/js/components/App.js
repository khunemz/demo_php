import React from "react";
import ReactDOM from "react-dom";
import { ChakraProvider, ColorModeScript } from "@chakra-ui/react";
import theme from './../extendTheme'
import Navbar from "./Navbar";
import { Container, Box } from "@chakra-ui/react";
import Hero from "./Hero";


function App() {
    return (
        <ChakraProvider theme={theme}>
            <ColorModeScript initialColorMode={theme.config.initialColorMode} />
            <Navbar />         
            <Hero />
        </ChakraProvider>
    );
}

export default App;

if (document.getElementById("myapp")) {
    ReactDOM.render(<App />, document.getElementById("myapp"));
}
