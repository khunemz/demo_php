import React from "react";
import {
    Container,
    Box,
    Heading,
    Image,
    Input,
    Button,
    FormControl,
} from "@chakra-ui/react";
import { Search2Icon } from "@chakra-ui/icons";
import HeroCarousel from "./HeroCarousel";

export default function Hero() {
    return (
        <div>
            <Box>
                <Container maxWidth="container.xl" py="10">
                    <Box
                        d="flex"
                        alignItems="center"
                        py="10"
                        flexDirection="row"
                    >
                        <Box w="100%" mr="6">
                            <HeroCarousel />
                        </Box>
                        
                    </Box>
                </Container>
            </Box>
        </div>
    );
}
