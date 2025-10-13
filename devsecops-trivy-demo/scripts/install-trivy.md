```
sudo apt update && sudo apt install -y wget gnupg lsb-release  
wget -qO - https://aquasecurity.github.io/trivy-repo/deb/public.key | sudo gpg --dearmor -o /usr/share/keyrings/trivy.gpg  
echo "deb [signed-by=/usr/share/keyrings/trivy.gpg] https://aquasecurity.github.io/trivy-repo/deb $(lsb_release -cs) main" | \  
  sudo tee /etc/apt/sources.list.d/trivy.list  
sudo apt update && sudo apt install -y trivy && sudo apt autoremove -y
```
